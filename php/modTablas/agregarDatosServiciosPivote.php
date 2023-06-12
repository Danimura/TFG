<?php

include("../bbdd.php");

$n = $_POST['SPnombre'];
$p = $_POST['SPproceso'];

$sql = "INSERT INTO sectores_pivote (FK_PId, FK_Id_sector) VALUES ((SELECT PId FROM procesos WHERE Descripción = '$p'),(SELECT Id_sector FROM sectores_servicios WHERE Sector = '$n')) ";

$result = mysqli_query($con,$sql);

echo $result;

?>
