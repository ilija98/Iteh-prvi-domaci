<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/nastup.php";


$vrsta=Vrsta::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$naslov=trim($_POST['naslov']);
	$cena=trim($_POST['cena']);
    $trajanje=trim($_POST['trajanje']);
    $datum_izvodjenja=trim($_POST['datum_izvodjenja']);
    $vrsta=$_POST['vrsta'];
    
	
	
	$data = Array (
				"naslov" => $naslov, 
				"cena" => $cena,
				"trajanje" => $trajanje,					
				"datum_izvodjenja" => $datum_izvodjenja,					
                "id_vrste" => $vrsta,    
        );	
        
	$nastup=new Nastup(null,$naslov,$cena,$trajanje,$datum_izvodjenja,$vrsta);
		
		$nastup->ubaciNastup($data,$mysqli);
		
        $nastup = $nastup->getPoruka();
        header("Location:unosnovognastupa.php");
        
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos novog nastupa</title>
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
            <form name="unosNastupa" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov nastupa:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov" placeholder="Unesite naslov nastupa">
                </div>
                <div class="form-group">
                    <label for="cena">Cena karte:</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu karte">

                </div>
                <div class="form-group">
                    <label for="trajanje">Trajanje nastupa:</label>
                    <input type="text" class="form-control" name="trajanje" id="trajanje" placeholder="Unesite trajanje nastupa">

                </div>

                <div class="form-group">
                    <label for="datum_izvodjenja">Datum izvodjenja nastupa:</label>
                    <input type="text" class="form-control" name="datum_izvodjenja" id="datum_izvodjenja" placeholder="Unesite datum izvodjenja nastupa">

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
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>