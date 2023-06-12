<?php

include("../bbdd.php");

$id = $_POST['PId'];

$sql = "DELETE FROM procesos WHERE PId='$id' ";
echo $result = mysqli_query($con,$sql);

?>