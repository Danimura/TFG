<?php

include("../bbdd.php");

$id = $_POST['SId'];

$sql = "DELETE FROM sectores_servicios WHERE Id_sector='$id' ";
echo $result = mysqli_query($con,$sql);

?>