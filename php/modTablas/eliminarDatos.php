<?php

include("../bbdd.php");

$id = $_POST['id'];

$sql = "DELETE FROM dimensiones WHERE Id='$id' ";
echo $result = mysqli_query($con,$sql);

?>