<?php

include("bbdd.php");

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['SubmitB'])){

    $Enombre = $_POST["ListaEmpresas"];
    $_SESSION["idEmpresa"] = $Enombre;
    
    header("Location: ../Evaluación.php");
    exit();
}
?>