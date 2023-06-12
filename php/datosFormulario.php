<?php

include("bbdd.php");

if (!isset($_SESSION)) {
    session_start();
}


//Condicional de si se pulsa el botón
if (isset($_POST['SubmitE'])) {
        

    //recuperar las variables
    $Enombre = $_POST['Enombre'];
    $Esector = $_POST['Esector'];
    $Etrab = $_POST['Etrab'];
    $Terc = $_POST['Terc'];
    $Efact = $_POST['Efact'];
    $Alc = $_POST['Alc'];
    $Ecli = $_POST['Ecli'];
    
    if ($_POST['Eval']=="Otro") {
        $Eval = $_POST['textoEvalE'];
    } else {
        $Eval = $_POST['Eval'];
    }

    if ($_POST['Modelo']=="Otro") {
        $Modelo = $_POST['textoModE'];
    } else { 
        $Modelo = $_POST['Modelo'];
    }

   if ($Etrab==11){
        $Tipem = 1;
   } else if ($Etrab==50){
        $Tipem = 2;
   } else {
        $Tipem = 3;
   }

   $_SESSION["idEmpresa"] = $Enombre;
   

    //hacemos la sentencia de sql
    $sql = "INSERT INTO formularioinicial VALUES('$Enombre',(SELECT Id_sector FROM sectores_servicios WHERE Sector = '$Esector'),'$Etrab','$Terc','$Ecli','$Efact','$Alc','$Eval','$Modelo', '$Tipem','')";


    //ejecutamos la sentencia de sql
    $ejecutar = mysqli_query($con,$sql);
    
    header("Location: ../Evaluación.php");
    exit();


}


?>