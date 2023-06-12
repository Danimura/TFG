<?php

include("../bbdd.php");

$n = $_POST['Fnombre'];
$d = $_POST['Fdimension'];

$sql = "INSERT INTO factores (FNombre, Id_Dimensiones) VALUES ('$n' , (SELECT Id FROM dimensiones WHERE Nombre = '$d')) ";

echo $result = mysqli_query ($con,$sql);


?>