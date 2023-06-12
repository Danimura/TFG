<?php

include("../bbdd.php");

$n = $_POST['nombreM'];
$v = $_POST['valorM'];
$c = $_POST['colorM'];

$sql_nuevo = "INSERT INTO nivel_madurez (Madurez, Resultado_minimo, color) VALUES ('$n', $v,'$c')";

$result = mysqli_query ($con,$sql_nuevo);

echo $result;


?>