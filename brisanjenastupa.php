<?php
include "server/konekcija.php";

$id=$_GET['id'];
$sql = "DELETE FROM nastup WHERE id_nastupa='".$id."'";
$mysqli->query($sql) or die($sql);

header("Location:repertoar.php");
 ?>