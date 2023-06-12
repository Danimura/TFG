<?php

include("../bbdd.php");

$id = $_POST['id'];
$n = $_POST['nombre'];
$d = $_POST['factor'];
$t = $_POST['tipo'];

$sql = "UPDATE procesos SET Descripción = '$n',Id_Factores = (SELECT FId FROM factores WHERE FNombre = '$d'), Id_tipoempresa = (SELECT Id_tipoemp FROM tipo_empresa WHERE Descripcion_empresa = '$t') WHERE PId = '$id' ";

echo $result = mysqli_query($con,$sql);

?>