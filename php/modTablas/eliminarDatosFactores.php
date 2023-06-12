<?php

include("../bbdd.php");

$id = $_POST['Fid'];

$sql = "DELETE FROM factores WHERE FId='$id' ";
echo $result = mysqli_query($con,$sql);

?>