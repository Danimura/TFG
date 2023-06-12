<?php

include("../bbdd.php");

$id = $_POST['TId'];

$sql = "DELETE FROM tareas WHERE Codigo='$id' ";
echo $result = mysqli_query($con,$sql);

?>