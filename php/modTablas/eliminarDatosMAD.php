<?php

include("../bbdd.php");

$id = $_POST['MADid'];

$sql = "DELETE FROM nivel_madurez WHERE Id_madurez = $id ";
$result = mysqli_query($con,$sql);
echo $result;

?>