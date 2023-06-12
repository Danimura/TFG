<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombreE'];
$c = $_POST['colorME'];

$sql = "UPDATE dimensiones SET Nombre = '$n', Color_Dim = '$c' WHERE Id = '$id' ";

$result = mysqli_query($con,$sql);

echo $result;

?>