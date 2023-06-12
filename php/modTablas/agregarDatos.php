<?php

include("../bbdd.php");

$n = $_POST['nombre'];
$c = $_POST['colorD'];

$sql_nuevo = "INSERT INTO dimensiones (Id, Nombre, Color_Dim) SELECT 1 + coalesce((SELECT max(Id) FROM dimensiones), 0), '$n', '$c'";

$result = mysqli_query ($con,$sql_nuevo);

echo $result;


?>