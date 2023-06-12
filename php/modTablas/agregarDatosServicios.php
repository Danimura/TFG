<?php

include("../bbdd.php");

$n = $_POST['Snombre'];

$sql = "INSERT INTO sectores_servicios(Sector) VALUES ('$n')";

echo $result = mysqli_query($con,$sql);


?>