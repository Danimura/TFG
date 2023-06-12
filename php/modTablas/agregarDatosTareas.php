<?php

include("../bbdd.php");

$id = $_POST['TId'];
$n = $_POST['Tnombre'];
$p = $_POST['Tproceso'];

$sql = "INSERT INTO tareas (Codigo, T_Descripcion, Id_Procesos) VALUES ('$id','$n' , (SELECT PId FROM procesos WHERE Descripción = '$p'))";

echo $result = mysqli_query($con,$sql);


?>