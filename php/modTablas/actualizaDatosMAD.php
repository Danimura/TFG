<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombreE'];
$c = $_POST['colorME'];
$v = $_POST['valorE'];


$sql = "UPDATE nivel_madurez SET Madurez='$n',Resultado_minimo = $v, color = '$c' WHERE Id_madurez = $id ";

$result = mysqli_query($con,$sql);

echo $result;

?>