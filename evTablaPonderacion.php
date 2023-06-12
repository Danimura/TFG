<?php
include("php/idEmp.php");
$select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
$sql_select = mysqli_query($con,$select);

while ($row = $sql_select->fetch_array()){

    $sql = $con->query("SELECT * FROM dimensiones");
}

while ($row2 = $sql->fetch_array()){

$id_dim1 = $row2['Id'];


?> <script type="text/javascript">
        document.getElementById("dim1_<?= $id_dim1 ?>").style.color= "rgba(<?= $row2['Color_Dim'] ?>, 1)";
        document.getElementById("dim2_<?= $id_dim1 ?>").style.backgroundColor= "rgba(<?= $row2['Color_Dim'] ?>, 1)";
        document.getElementById('filtroFac_<?= $id_dim1 ?>').style.borderColor= 'rgba(<?= $row2['Color_Dim'] ?>, 1)';
        document.getElementById('filtroAll_<?= $id_dim1 ?>').style.backgroundColor= 'rgba(<?= $row2['Color_Dim'] ?>, 0.6)';
        document.getElementById('filtroNone_<?= $id_dim1 ?>').style.backgroundColor= 'rgba(<?= $row2['Color_Dim'] ?>, 0.1)';
    </script>


<table class="table" id="tablaDinamicaEvD_<?= $id_dim1 ?>" style="">
    
    <div style="padding-left:5px;">
    <b id="dim1_<?= $row2['Id'] ?>" style="padding-top:8px; font-size: 15px; color:rgba(147, 129, 255, 1.0)">DIMENSIÓN</b>
    </div>

    <div id="dim2_<?= $row2['Id'] ?>" style="background-color:rgba(147, 129, 255, 1.0); border-radius: 5px; padding:5px;">
        <b style="padding-top:8px; color:white; font-size: 30px;"><?= $row2['Nombre'] ?></b>
    </div>

    <div class="container" style="margin-top: 10px;">
        <div style="padding:5px; text-align: center;">
            <b id="filtroFac_<?= $id_dim1 ?>" style="padding-top:8px; font-size: 20px; 
                border-bottom-style: solid; border-color:rgb(147, 129, 255, 1.0); 
                border-width: 2px;">
            FILTRO FACTORES
            </b>
        </div>
        <br>
    </div>
    <div class="btn-group flex-wrap" role="group" style="text-align: center;width: 100%;">
            <button type="button" class="btn" style="background-color:rgba(147, 129, 255, 0.4)" id="filtroAll_<?= $id_dim1 ?>"><b>TODO</b></button>
        <?php
   
            $select10 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
            $sql_select10 = mysqli_query($con,$select10);

            while ($row10 = $sql_select10->fetch_array()){
                $sql2 = $con->query("SELECT * FROM factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $id_dim1");
            }

            while ($row11 = $sql2->fetch_array()){
        ?>
            <button type="button" class="btn" style="background-color:rgba(147, 129, 255, 0.4)"
                id="filtro_<?= $id_dim1 ?>_<?= $row11['FId'] ?>"><b><?= $row11['FNombre'] ?></b>
            </button>
       <?php    
                if($row11['FNombre']=="Tratamiento y Explotación de datos e información"){
                    echo "<script type='text/javascript'>
                                document.getElementById('filtro_1_5').innerHTML= '<b>Tratamiento de datos</b>';
                        </script>";
                }
            }
        ?>
            <button type="button" class="btn" style="background-color:rgba(147, 129, 255, 0.1)" id="filtroNone_<?= $id_dim1 ?>"><b>NADA</b></button>
    </div>
    
    <?php
        $select2 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
        $sql_select2 = mysqli_query($con,$select2);
        $id_dim = $row2['Id'];

        while ($row3 = $sql_select2->fetch_array()){
            $sql2 = $con->query("SELECT * FROM factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $id_dim");
        }

        while ($row4 = $sql2->fetch_array()){   
$id_fac1 = $row4['FId'];
?>
</table>
<div id="TextoNada_<?= $id_dim1 ?>" style="text-align: center;display:none;">No se están mostrando resultados</div>
<table class="table table-condensed table-borderless" id="tablaDinamicaEvF_<?= $id_dim1 ?>_<?= $row4['FId'] ?>">
    <thead>
        <td><p id="factor_<?= $id_fac1 ?>" colspan="3" style="padding-left:8px; font-size: 30px; border-left-style: solid; 
                                                        border-color:rgb(147, 129, 255); border-width: 5px; 
                                                        text-transform: uppercase;">
                <?= $row4['FNombre'] ?>
            </p>
        </td>
    </thead>
<?php 
        $empresa = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
        $sql_empresa = mysqli_query($con,$empresa);
        $id_fac = $row4['FId'];
        while ($rowEmp = $sql_empresa->fetch_array()){
            $sqlA = $con->query("SELECT * FROM procesos INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON FId = Id_Factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $id_dim AND Id_Factores = $id_fac AND Id_tipoempresa > $rowEmp[Id_tipo_empresa] AND FK_Id_sector = $rowEmp[id_sector]");
        }
        while ($rowA = $sqlA->fetch_array()){

            $id_procA = $rowA['IdProcesos'];
        
            echo "<script type='text/javascript'>
                    document.getElementById('factor_$id_fac1').style.borderColor= 'rgba($row2[Color_Dim], 0.3)';   
                    document.getElementById('filtro_$row2[Id]_$rowA[FId]').style.backgroundColor= 'rgba(207, 207, 207, 0.2)';
                    document.getElementById('filtro_$row2[Id]_$rowA[FId]').style.color= 'rgba(0, 0, 0, 0.3)';
                </script>";
        }
?>
    <?php
        $select3 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
        $sql_select3 = mysqli_query($con,$select3);
        $id_fac = $row4['FId'];
        while ($row5 = $sql_select3->fetch_array()){
            $sql3 = $con->query("SELECT * FROM procesos INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON FId = Id_Factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $id_dim AND Id_Factores = $id_fac AND Id_tipoempresa <= $row5[Id_tipo_empresa] AND FK_Id_sector = $row5[id_sector]");
        }

        while ($row6 = $sql3->fetch_array()){
            $id_proc1 = $row6['IdProcesos'];

        echo "<script type='text/javascript'>
            document.getElementById('factor_$id_fac1').style.borderColor= 'rgba($row2[Color_Dim], 1)';
            document.getElementById('pid_$id_proc1').style.backgroundColor= 'rgba($row2[Color_Dim], 0.5)';
            document.getElementById('tar1_$id_proc1').style.backgroundColor= 'rgba($row2[Color_Dim], 0.3)';
            document.getElementById('tar2_$id_proc1').style.backgroundColor= 'rgba($row2[Color_Dim], 0.3)';
            document.getElementById('tar3_$id_proc1').style.backgroundColor= 'rgba($row2[Color_Dim], 0.3)';
            document.getElementById('filtro_$row2[Id]_$id_fac1').style.backgroundColor= 'rgba($row2[Color_Dim], 0.1)';
            document.getElementById('filtro_$row2[Id]_$id_fac1').style.color= 'rgba(0, 0, 0, 0.8)';    
            </script>";

    ?>

    <thead>
        <td id="pid_<?= $id_proc1 ?>" colspan="3" style="text-align: center; color; background-color:rgba(147, 129, 255, 0.5);">
            <b style="font-size: 20px;">PROCESO <?= $row6['PId'] ?>: <?= $row6['Descripción'] ?></b>
        </td>
    </thead>

    <?php
        $select10 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
        $sql_select10 = mysqli_query($con,$select10);
        $id_proc = $row6['PId'];

        while ($row7 = $sql_select10->fetch_array()){
            $sql5 = $con->query("SELECT * FROM tareas INNER JOIN procesos ON PId = Id_Procesos INNER JOIN factores ON FId = Id_Factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE PId = '$id_proc' ");
        }

       ?>

    <thead style="text-align:center;">
        <tr>
            <td id="tar1_<?= $id_proc1 ?>">Tarea</td>
            <td id="tar2_<?= $id_proc1 ?>">Ponderación</td>
            <td id="tar3_<?= $id_proc1 ?>">Agregar información</td>
        </tr>
    </thead>
    <?php
     while ($row8 = $sql5->fetch_array()){ 

    ?>
    <tbody>
                <tr style="border-top-style: solid; border-width:1px; border-color: rgb(211, 211, 211);">
                    <td width="70%"><?= $row8['T_Descripcion'] ?></td>
                    <td>

                        
                            <input type="radio" id="<?= $row8['Codigo'] ?>_0" name="Ta_<?= $row8['Id_Tareas'] ?>" value="0">
                            <label>0</label><br>
                            <input type="radio" id="<?= $row8['Codigo'] ?>_1" name="Ta_<?= $row8['Id_Tareas'] ?>" value="1">
                            <label>1</label><br>
                            <input type="radio" id="<?= $row8['Codigo'] ?>_2" name="Ta_<?= $row8['Id_Tareas'] ?>" value="2">
                            <label>2</label><br>


                    </td>
                    <td>
                            <textarea style="background-color:rgba(255, 255, 255,0.3); width: 100%;" class="form-control" rows="4" id="<?= $row8['Codigo'] ?>_textarea" name="<?= $row8['Codigo'] ?>_textarea" placeholder="Agregue información en caso de ser necesario"></textarea>
                    </td>
                </tr>

    </tbody>

<script type="text/javascript">

$(document).ready(function() {
  
  $("#filtroAll_<?=$id_dim1?>").click(function() {
    
    $("#TextoNada_<?= $id_dim1 ?>").hide();
    $("#tablaDinamicaEvF_<?=$id_dim1?>_<?=$id_fac1?>").show();
        
    $("#filtro_<?=$id_dim1?>_<?=$id_fac1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");
    $("#filtroAll_<?=$id_dim1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.5)");
    $("#filtroNone_<?=$id_dim1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");

  });

  $("#filtroNone_<?=$id_dim1?>").click(function() {

    $("#TextoNada_<?= $id_dim1 ?>").show();
    $("#tablaDinamicaEvF_<?=$id_dim1?>_<?=$id_fac1?>").hide();
        
    $("#filtro_<?=$id_dim1?>_<?=$id_fac1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");
    $("#filtroNone_<?=$id_dim1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.5)");
    $("#filtroAll_<?=$id_dim1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");

  });

  $("#filtro_<?=$id_dim1?>_<?=$id_fac1?>").click(function() {

    $("table[id^='tablaDinamicaEvF_<?=$row2["Id"]?>_']").not("#tablaDinamicaEvF_<?=$id_dim1?>_<?=$id_fac1?>").hide();
    $("#filtroAll_<?=$id_dim1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");
    $("#filtroNone_<?=$id_dim1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");
    $("button[id^='filtro_<?=$row2["Id"]?>_']").not("#filtro_<?=$id_dim1?>_<?=$id_fac1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.1)");
    $("#filtro_<?=$id_dim1?>_<?=$id_fac1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.5)");
    $("#filtro_<?=$id_dim1?>_<?=$id_fac1?>").css("background-color", "rgba(<?=$row2["Color_Dim"]?>, 0.5)");



    
    $("#tablaDinamicaEvF_<?=$id_dim1?>_<?=$id_fac1?>").show();
    $("#TextoNada_<?= $id_dim1 ?>").hide();
    
    
  });

});
</script>






<?php

}

?>


<?php

}

?>


<?php

}

?>


<?php

}

?>

</table>

