<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombre'];
$d = $_POST['dimension'];

$sql = "UPDATE factores SET FNombre = '$n',Id_Dimensiones = (SELECT Id FROM dimensiones WHERE Nombre = '$d') WHERE FId = '$id' ";

echo $result = mysqli_query($con,$sql);

?>