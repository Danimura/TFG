<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombre'];
$p = $_POST['proceso']

$sql = "UPDATE sectores_pivote SET FK_PId = (SELECT PId FROM procesos WHERE Descripción = '$p'), FK_Id_sector = (SELECT Id_sector FROM sectores_servicios WHERE Sector = '$n') WHERE Id_pivote = '$id'";

$result = mysqli_query($con,$sql);

echo $result;


?>