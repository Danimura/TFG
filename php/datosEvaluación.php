<?php 

include("bbdd.php");

$i = 1;
$datos = $con->query("SELECT * FROM tareas");
$DateAndTime = date('d-m-Y G:i:s', time());

$IDEMP = $_POST["tipoEmpresa"];




while($filas = $datos->fetch_array()){

    if($_POST["dato$i"] === "undefined"){
        $i++;

    } else {

        $comen = $_POST["comentario$i"];
        $valor = $_POST["dato$i"];
        $sqlInsert = "INSERT INTO ponderacion VALUES ($IDEMP,'$filas[Codigo]',(SELECT Id_Tareas FROM tareas WHERE Codigo = '$filas[Codigo]'),$valor,'$comen','$DateAndTime')";
        $result = $con->query($sqlInsert);
        $i++; 

    }

}

$sqlI = "INSERT INTO ponderacion_pivote VALUES ('$DateAndTime',$IDEMP)";
$result1 = $con->query($sqlI);







    


?>