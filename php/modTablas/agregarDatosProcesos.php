<?php

include("../bbdd.php");

$id = $_POST['PId'];
$n = $_POST['Pnombre'];
$d = $_POST['Pfactor'];
$t = $_POST['Ptipo'];

$sql = "INSERT INTO procesos (PId, Descripción, Id_Factores, Id_tipoempresa) VALUES ('$id','$n' , (SELECT FId FROM factores WHERE FNombre = '$d'), (SELECT Id_tipoemp FROM tipo_empresa WHERE Descripcion_empresa = '$t')) ";

echo $result = mysqli_query($con,$sql);


?>