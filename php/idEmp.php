<?php

include("bbdd.php");

if (!isset($_SESSION)) {
    session_start();
}

$id_empresa = "SELECT Id_empresa FROM formularioinicial WHERE Nombre_empresa = '$_SESSION[idEmpresa]'";
$e_empresa = mysqli_query($con,$id_empresa);
$tipoEmpresa = $e_empresa -> fetch_array();

$n = $_SESSION["idEmpresa"];

?>



