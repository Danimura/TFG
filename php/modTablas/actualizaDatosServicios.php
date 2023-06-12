<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombre'];

$sql = "UPDATE sectores_servicios SET Sector = '$n' WHERE Id_sector = '$id'";

echo $result = mysqli_query($con,$sql);

?>