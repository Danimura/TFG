<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombre'];
$p = $_POST['proceso'];

$sql = "UPDATE tareas SET T_Descripcion = '$n', Id_Procesos = (SELECT PId FROM procesos WHERE Descripción = '$p') WHERE Codigo = '$id' ";

echo $result = mysqli_query($con,$sql);

?>