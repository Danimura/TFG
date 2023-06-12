<?php

include("../bbdd.php");

$id = $_POST['SPId'];

$sql = "DELETE FROM sectores_pivote WHERE Id_pivote='$id'";
$result = mysqli_query($con,$sql);
echo $result;


?>