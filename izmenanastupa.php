<!DOCTYPE html>
<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/nastup.php";

$id=$_GET['id'];

$nastup=Nastup::vratiSve($mysqli," where p.id_nastupa=".$id);
$vrsta=Vrsta::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naslov = $_POST['naslov'];
    $cena = $_POST['cena'];
    $trajanje = $_POST['trajanje'];
    $datum_izvodjenja = $_POST['datum_izvodjenja'];
    $vrsta = $_POST['vrsta'];       

    $mysqli->query("UPDATE nastup SET naslov='$naslov', cena='$cena', trajanje='$trajanje', datum_izvodjenja='$datum_izvodjenja',id_vrste='$vrsta' WHERE id_nastupa=$id");
    header('location: repertoar.php');
}
 ?>

<html>

<head>
    <?php
        include('head.php');
    ?>

    <title>Izmena nastupa</title>

</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov nastupa:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov"
                        value="<?php echo $nastup[0]->naslov; ?>">
                </div>
                <div class="form-group">
                    <label for="cena">Cena karte:</label>
                    <input type="text" class="form-control" name="cena" id="cena"
                        value="<?php echo $nastup[0]->cena; ?>">
                </div>
                <div class="form-group">
                    <label for="trajanje">Trajanje nastupa:</label>
                    <input type="text" class="form-control" name="trajanje" id="trajanje"
                        value="<?php echo $nastup[0]->trajanje; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_izvodjenja">Datum izvođenja nastupa:</label>
                    <input type="text" class="form-control" name="datum_izvodjenja" id="datum_izvodjenja"
                        value="<?php echo $nastup[0]->datum_izvodjenja; ?>">
                </div>
                <div class="form-group">
                    <label for="vrsta">Vrsta nastupa:</label>
                    <select class="form-control" name="vrsta" id="vrsta">
                        <?php foreach($vrsta as $v): ?>
                        <option value="<?php echo $v->id_vrste;?>">
                            <?php echo $v->naziv_vrste;?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>