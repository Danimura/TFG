<?php
include("php/idEmp.php");

if (!isset($_SESSION)) {
    session_start();
}
?>


<!DOCTYPE html>

<html lang="es">
    
<head>
        
    <title>Evaluación</title>

    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>




    <style type="text/css">
        @media print {
           /* Todas las reglas Css */
           @page {
              size: A4;/* es el valor por defecto */

            }

            header h1 {
                background: #fff;
                position: fixed;
                top: 0;
            }
        }
    </style>
</head>

<body style="font-family: sans-serif; background-attachment: fixed; background-image:url(imagenes/2.jpg);background-repeat:no-repeat; width:100%;background-size:cover;">

    <nav id="navbarEv" class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.7);margin-bottom: 10px;">

      <a class="navbar-brand" href="#"><img src="imagenes/Logo URJC Trabajos.png" style="width: 100px;"></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Nuevos_registros.php">Nuevo registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="BusquedaRegistros.php">Buscar empresa</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Evaluación <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a id="informeNB" class="nav-link disabled" onclick="informefinal();">Informe</a>
          </li>
        </ul>
        <div id="Titulo" style="color:white;text-decoration-line: overline;border-radius: 0px;font-size: 25px;text-align: left;padding-right: 40PX;font-weight: bold;">EVALUACIÓN</div>
      </div>

    </nav>
    
<?php
    $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
    $sql_select = mysqli_query($con,$select);

    while ($row = $sql_select->fetch_array()){
        $select2 = "SELECT * from sectores_servicios WHERE Id_sector=$row[id_sector]";
        $sql_select2 = mysqli_query($con,$select2);
        while ($row2 = $sql_select2->fetch_array()){
?>
    <div class="container" id="nombreEmp" style="background-color:rgba(255,255,255, 1.0); border-radius: 10px; padding:5px; text-align: center;margin-top: 10px; background-image: url(imagenes/3.jpg); background-size:cover; background-position:center;background-repeat:no-repeat">
            <h style="font-size: 35px;">Nombre de la empresa:  </h><b style="font-size: 35px;"><?php echo $row["Nombre_empresa"];?> </b> <br>
            <h style="font-size: 35px;">Sector de la empresa:  </h><b style="font-size: 35px;"><?php echo $row2["Sector"];?> </b>
    </div>
<?php 
        }
    }
?>
    <div class="container" id="ListaEmp" style="width: 50%;margin-top: 10px;margin-bottom: 10px; background-color: rgba(255, 255, 255, 1.0); padding:10px; border-radius:10px; background-image: url(imagenes/3.jpg); background-size:cover; background-position:center;background-repeat:no-repeat;">

            <label>En caso de existir más evaluaciones, eliga la que desee:</label>

            <select name="ListaVersiones" id="ListaVersiones" class="form-control input-small">
                <option value="Nada">No se ha seleccionado nada</option>
            <?php  
            $sqlHora="SELECT * FROM ponderacion_pivote WHERE Id_empresa_pivote = $tipoEmpresa[0] ORDER BY ID_Hora DESC";
            $resultHora=mysqli_query($con,$sqlHora);

            while ($rowHora = $resultHora->fetch_array()){
                $split = explode(" ",$rowHora['ID_Hora']);
            ?>  

                <option value="<?= $rowHora['ID_Hora'] ?>">Evaluación subida el <?= $split[0] ?> a las <?= $split[1] ?></option>
            
            <?php

            }

            ?>  
            </select>

        <script type="text/javascript">

        $("#ListaVersiones").change(function() {
            let hora = document.getElementById("ListaVersiones").value;
            cambio();
        });
        </script>

    </div>

    <div class="container" id="contenedorEv" style="background-color: white;border-radius: 10px;margin-top: 10px;margin-bottom: 10px;">
                <br>               
                <div id="evTablaPonderacion"></div>
                <br>
                <input id="SubmitO" type="submit" class="btn btn-dark btn-lg" style="text-align:center;" value="Terminar evaluación">
                <br>
                <br>
    </div>
    
    

    <div id="inicioPag"></div>
    
    
    
    <div class="container" id="filtroComp" style="display: none; background-color: white;border-radius: 10px; padding-top:20px; padding-bottom: 20px;margin-top: 10px;">
        <br>
        <br>

        <div style="padding:5px; text-align: center;">
            <b style="padding-top:8px; font-size: 20px; border-bottom-style: solid; border-color:rgb(37, 36, 34, 1.0); border-width: 4px; padding-left: 50px; padding-right: 50px;">
            FILTRO COMPLETITUD:
            </b>
        <br>   
        </div>

        

        <div class="btn-group btn-group-justified flex-wrap" role="group" aria-label="..." style="padding-right: 25px; width:100%;margin-top: 10px;">             
              
                <button type="button" class="btn btn-dark" id="filtroCompD">DIMENSIONES</button>

                <button type="button" class="btn btn-light" id="filtroCompTareas">TAREAS</button>
              
                <button type="button" class="btn btn-light" id="filtroCompProc">PROCESOS</button>
              
                <button type="button" class="btn btn-light" id="filtroCompFact">FACTORES</button>
              
                <button type="button" class="btn btn-light" id="filtroMadDim">MADUREZ DIMENSIONES</button>
              
                <button type="button" class="btn btn-light" id="filtroMadTab">MADUREZ TABLA</button>
        </div>

        <br>
        <br>
        <br>
    </div>

<!--FASE 1-->
<div class="container" id="graficos" style="display:none;background-color: white;border-radius: 10px; padding:50px;margin-top: 10px;">
    <?php 

    $select = "SELECT * from dimensiones";
    $sql_select = mysqli_query($con,$select);

    while ($row = $sql_select->fetch_array()){
        $select2 = "SELECT * from factores WHERE Id_Dimensiones = $row[Id]";
        $sql_select2 = mysqli_query($con,$select2);
    ?>
    <div class="container">
        <div style="text-align:center;font-size: 20px;border-bottom-style: solid; border-color:rgba(<?= $row["Color_Dim"] ?>);
            margin-top: 10px;">
            <b style="text-transform: uppercase;">GRADO DE COMPLETITUD <?= $row["Nombre"] ?></b>
        </div>
        <br>
        <div class="" style="display: flex; flex-flow: row wrap;">
    <?php  
        while ($rowF = $sql_select2->fetch_array()){
    ?>
            <div style="width: 50%; margin: auto;margin-top: 10px;text-align: center;">
                <b style="text-transform: uppercase;font-size:20px; text-align:center; font-weight: bold; 
                    color:rgba(<?= $row["Color_Dim"] ?>, 1.0)">
                    <?= $rowF["FNombre"] ?>
                </b>
                <canvas id="myChart<?= $rowF["FId"] ?>"></canvas>   
            </div>
                    
    <?php
        }
    ?>
        </div>
    </div>
    <?php 
    } 
    ?>
</div>   

<!--FASE 2 TAREAS-->
<div class="container-md" id="completitud_tareas_leyenda" style="display:none; background-color: white;border-radius: 10px; padding:50px;margin-top: 10px;">
    
    <div class="row">
        <div class="col-sm-12">
            <p style="background-color: rgba(37, 36, 34, 0.9);padding:10px; color: white;text-align: center; font-weight: bold">LEYENDA</p><p style="text-align:center; font-size: 20px;">Los resultados de las tareas se agrupan por niveles y colores:</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <p style="background-color: rgba(211, 77, 77, 0.7);padding:5px;text-align: center; font-size: 20px;">Nivel 0</p><p style="text-align: justify; font-size: 17px;"> No cumple en ningún sentido los requisitos de esta tarea.</p>
        </div>
        <div class="col-sm-4">
            <p style="background-color: rgba(243, 162, 52, 0.7);padding:5px;text-align: center; font-size: 20px;">Nivel 1</p><p style="text-align: justify; font-size: 17px;">Cumple parcialmente los requisitos establecidos en la tarea, teniendo así parte de la misma sin cumplir.</p>
        </div>
        <div class="col-sm-4">
            <p style="background-color: rgba(89, 222, 127, 0.7);padding:5px;text-align: center; font-size: 20px;">Nivel 2</p><p style="text-align: justify; font-size: 17px;">Cumple totalmente los requisitos de la tarea.</p>
        </div>
    </div>

</div>

<div class="container-md" id="completitud_tareas" style="display:none; background-color: white;border-radius: 10px; padding:50px; margin-top: 10px;">

<?php 
    $selectD = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
    $sql_selectD = mysqli_query($con,$selectD);

    while ($rowT = $sql_selectD->fetch_array()){
        $sqlD = $con->query("SELECT * FROM dimensiones");
    }
    while ($rowDim = $sqlD->fetch_array()){

?>

    <div class="col-sm-12">
    <p id="t_<?=$rowDim['Id']?>" style="text-align:center;font-size: 20px;border-bottom-style: solid; border-color: rgba(<?= $rowDim["Color_Dim"] ?>, 1.0);"><b><?=$rowDim['Nombre']?></b></p>
        <table class="table table-condensed table-responsive">
            
            <thead style="text-align:center;">
                <tr>
                    <td id="tr1_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Código</td>
                    <td id="tr2_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Tarea</td>
                    <td id="tr3_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Nivel</td>              
                </tr>
            </thead>

            <tbody>
            <?php

                $id_dim1 = $rowDim['Id'];

                $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                $sql_select = mysqli_query($con,$select);
                while ($row2 = $sql_select->fetch_array()){
                    $sql = $con->query("SELECT * FROM tareas INNER JOIN procesos ON PId = Id_Procesos INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON FId = Id_Factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $rowDim[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector]");
                }
                while ($row = $sql->fetch_array()){                 
            ?>
                    <tr id="Tarea_<?= $row['Id_Tareas']?>">
                        <td style="text-align: center;"><?= $row['Codigo'] ?></td>
                        <td width="65%"><?= $row['T_Descripcion'] ?></td>
                        <td style="text-align: center;"><div id="T_<?= $row['Id_Tareas']?>" style="border-radius: 5px;"></div></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
        <br>
<?php    
    }
?>        

</div>

<!--FASE 3 PROCESOS-->
<div class="container-md" id="completitud_procesos_leyenda" style="display:none; background-color: white;border-radius: 10px; padding:50px; font-family: sans-serif;margin-top: 10px;">
    
    <div class="row">
        <div class="col-sm-12">
            <p style="background-color: rgba(37, 36, 34, 0.9);padding:10px; color: white;text-align: center; font-weight: bold">LEYENDA</p><p style="text-align:center; font-size: 20px;">Los resultados de los procesos se agrupan por niveles y colores:</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <p style="background-color: rgba(211, 77, 77, 0.7);padding:5px;text-align: center; font-size: 20px;">Objetivo no alcanzado <br>&nbsp;</p><p style="text-align: justify; font-size: 17px;"> El proceso no ha alcanzado un mínimo de <strong>15 %</strong>, por lo que se considera que no se cumple el proceso.</p>
        </div>
        <div class="col-sm-3">
            <p style="background-color: rgba(243, 162, 52, 0.7);padding:5px;text-align: center; font-size: 20px;">Objetivo alcanzado parcialmente</p><p style="text-align: justify; font-size: 17px;">El proceso tiene algunas tareas que se cumplen en cierta medida, por lo que el proceso se considera alcanzado, pero solo en algunos aspectos.</p>
        </div>
        <div class="col-sm-3">
            <p style="background-color: rgba(244, 208, 63, 0.5);padding:5px;text-align: center; font-size: 20px;">Objetivo alcanzado ampliamente</p><p style="text-align: justify; font-size: 17px;">El proceso contiene tareas que han sido cumplidas en gran parte, por lo que se considera que este ha sido cumpliado en su mayor parte.</p>
        </div>
        <div class="col-sm-3">
            <p style="background-color: rgba(89, 222, 127, 0.7);padding:5px;text-align: center; font-size: 20px;">Objetivo alcanzado totalmente</p><p style="text-align: justify; font-size: 17px;">Al cumplirse más de un <strong>85 %</strong> del proceso, este se considera cumplido en su totalidad.</p>
        </div>
    </div>

</div>



<div class="container" id="completitud_procesos" style="display:none; background-color: white;border-radius: 10px; padding:50px; margin-top: 10px;">
<?php 
    $selectD = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
    $sql_selectD = mysqli_query($con,$selectD);
    while ($rowT = $sql_selectD->fetch_array()){
        $sqlD = $con->query("SELECT * FROM dimensiones");
    }
    while ($rowDim = $sqlD->fetch_array()){
?>
    <p id="p_<?=$rowDim['Id']?>" style="text-align:center;font-size: 20px;border-bottom-style: solid;border-color:rgba(<?= $rowDim["Color_Dim"] ?>, 1.0);"><b><?=$rowDim['Nombre']?></b></p>
        <table class="col-sm-12 table table-condensed table-responsive">
            
            <thead style="text-align:center;">
                <tr>
                    <td id="pr1_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Código</td>
                    <td id="pr2_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Proceso</td>
                    <td id="pr3_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Promedio</td>
                    <td id="pr4_<?= $rowDim['Id'] ?>" style="background-color: rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Nivel</td>              
                </tr>
            </thead>

            <tbody>
            <?php

                $id_dim1 = $rowDim['Id'];

                $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                $sql_select = mysqli_query($con,$select);
                while ($row2 = $sql_select->fetch_array()){        
                    $sql = $con->query("SELECT * FROM procesos INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON FId = Id_Factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $rowDim[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector]");
                }
                while ($row = $sql->fetch_array()){            
            ?>
                    <tr id="Proceso_<?= $row['IdProcesos']?>">
                        <td style="text-align: center;"><?= $row['PId'] ?></td>
                        <td width="65%"><?= $row['Descripción'] ?></td>
                        <td style="text-align: center;"><div id="P_<?= $row['IdProcesos']?>" style="border-radius: 5px;"></div></td>
                        <td width="100%" style="text-align: center;"><div id="PR_<?= $row['IdProcesos']?>" style="border-radius: 5px;"></div></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        <br>
<?php
    }
?>
</div>

<!--FASE 4 FACTORES-->

<div class="container" id="completitud_factores" style="display:none; background-color: white;border-radius: 10px; padding:50px;margin-top: 10px;">
<?php 
    $selectD = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
    $sql_selectD = mysqli_query($con,$selectD);

    while ($rowT = $sql_selectD->fetch_array()){
        $sqlD = $con->query("SELECT * FROM dimensiones");
    }
    while ($rowDim = $sqlD->fetch_array()){

?>

    <p id="f_<?=$rowDim['Id']?>" style="text-align:center;font-size: 20px;border-bottom-style: solid;border-color:rgba(<?= $rowDim["Color_Dim"] ?>, 1.0);"><b><?=$rowDim['Nombre']?></b></p>
        <table class="col-sm-12 table table-condensed table-responsive">
            
            <thead style="text-align:center;">
                <tr>
                    <td id="fc1_<?= $rowDim['Id'] ?>" style="background-color:rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Factores</td>
                    <td id="fc2_<?= $rowDim['Id'] ?>" style="background-color:rgba(<?= $rowDim["Color_Dim"] ?>, 0.3);">Promedio</td>              
                </tr>
            </thead>

            <tbody>
            <?php
                $id_dim1 = $rowDim['Id'];

                $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                $sql_select = mysqli_query($con,$select);
                while ($row2 = $sql_select->fetch_array()){ 
                    $sql = $con->query("SELECT * FROM factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $rowDim[Id]");
                }
                while ($row = $sql->fetch_array()){  
            ?>
                    <tr id="Factor_<?= $row['FId']?>">
                        <td width="100%"><?= $row['FNombre'] ?></td>
                        <td style="text-align: center;"><div id="<?= $row['FId']?>"></div></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        <br>
<?php
    }
?>
</div>

<!--FASE 5 DIMENSIONES-->

<div class="container" id="madurez_dimensiones" style="display:none; background-color: white;border-radius: 10px; padding:50px;margin-top: 10px;">
    <p style="text-align:center;font-size: 20px;border-bottom-style: solid;border-color:rgba(0, 0, 0, 0.7);"><b>MADUREZ DIMENSIONES</b></p>
        <div class="row">
            <div class="col-sm-6">
            <br>
            <br>
            <br>
            <br>
            <br>
                <table class="table">
                    
                    <thead style="text-align:center;">
                        <tr>
                            <td style="background-color:rgba(0, 0, 0, 0.1);">Dimensión</td>
                            <td style="background-color:rgba(0, 0, 0, 0.1);">Promedio</td>             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("php/idEmp.php");

                        $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                        $sql_select = mysqli_query($con,$select);

                        while ($row2 = $sql_select->fetch_array()){
                        
                            $sql = $con->query("SELECT * FROM dimensiones");
                        }

                        while ($row = $sql->fetch_array()){
                            
                        ?>

                            <tr>
                                <td height="70px" width="65%"><?= $row['Nombre'] ?></td>
                                <td style="text-align: center;"><div id="D_<?= $row['Id']?>"></div></td>
                            </tr>

                        <?php

                        }

                        ?>


                    </tbody>
                </table>
            </div>
            
            <div class="col-sm-6">
                <div id="graficosMadDim" style="height: auto; width: 100%; text-align: center;">
                    <p style="font-size:20px; text-align:center; font-weight: bold;">GRÁFICO</p>
                    <canvas id="myChartMadurez"></canvas>
                </div>
            </div>
            
        </div>
</div>


<!--FASE 6 MADUREZ -->

<div class="container" id="madurez_tabla" style="display:none; background-color: white; border-radius: 10px; padding:50px;margin-top: 10px;">
    <p style="text-align:center;font-size: 20px;border-bottom-style: solid;border-color:rgba(0, 0, 0, 0.7);"><b>TABLA MADUREZ</b></p>
            <div id="madurez_tablaROW" class="col-sm-12">
                <table style="width: 100%;">
<?php 
    $SQLstr = $con->query("SELECT count(*) FROM nivel_madurez");
    $result = $SQLstr->fetch_array();
    $num = $result[0];
?>
                    <thead>
                        <tr>
                            <th class="align-middle" rowspan="2" style="text-align:center; background-color:rgba(154, 140, 152, 0.1);">Dimensiones</th>
                            <th colspan="<?= $num * 3 ?>" style="text-align:center; background-color:rgba(154, 140, 152, 0.1);padding: 10px;">Niveles de madurez</th>             
                        </tr>
   
                        <tr>
                        <?php 
                            
                            $sql_madurez = $con->query("SELECT * FROM nivel_madurez");
                            
                            while ($rowMadurez = $sql_madurez->fetch_array()){
                        ?>
                            <th colspan="3" style="text-align:center; background-color:rgba(<?php echo $rowMadurez['color'] ?>,0.4);padding: 10px;"><?php echo $rowMadurez['Madurez'] ?></th>  

                        <?php 
                            }
                        ?>        
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        include("php/idEmp.php");

                        $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                        $sql_select = mysqli_query($con,$select);
                        $filas = $con->query("SELECT COUNT(Id_madurez) FROM nivel_madurez");
                        $filasrow = $filas ->fetch_array();
                        $columnas = $filasrow[0]*3;

                        while ($row2 = $sql_select->fetch_array()){
                        
                            $sql = $con->query("SELECT * FROM dimensiones");
                        
                            while ($row = $sql->fetch_array()){
                        ?>
                        <thead>
                            <tr>
                                <td class="align-middle" style="text-align:center;" width="30%"><?= $row['Nombre'] ?></td>
                                <?php
                                    for($i = 1; $i <= $filasrow[0]; $i++){
                                ?>
                                <td class="align-middle" id="Dim_<?= $row["Id"] ?>_Procesos<?= $i ?>" style="text-align:center;" >
                                    <?php
                                        $sqlMadDim = $con->query("SELECT * FROM procesos INNER JOIN nivel_madurez ON Id_madurez = FK_Id_madurez INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $row[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector] AND Id_madurez = $i");

                                        while ($rowMadDim = $sqlMadDim->fetch_array()){
                                    ?>
                                    <div id="Div_<?= $rowMadDim['PId'] ?>_<?= $rowMadDim['Id_madurez'] ?>" style="margin:5px;"></div>
                                    <?php 
                                       } 
                                    ?>
                                </td>
                                <td class="align-middle" id="LDim_<?= $row["Id"] ?>_Procesos<?= $i ?>" style="text-align:center;" >
                                    <?php
                                       $sqlMadDim = $con->query("SELECT * FROM procesos INNER JOIN nivel_madurez ON Id_madurez = FK_Id_madurez INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $row[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector] AND Id_madurez = $i");

                                        while ($rowMadDim = $sqlMadDim->fetch_array()){
                                    ?>
                                    <div id="LDiv_<?= $rowMadDim['PId'] ?>_<?= $rowMadDim['Id_madurez'] ?>" style="margin:5px;"></div>
                                    <?php 
                                       } 
                                    ?>
                                </td>
                                <td class="align-middle" id="IDim_<?= $row["Id"] ?>_Procesos<?= $i ?>" style="text-align:center;" >
                                    <?php
                                       $sqlMadDim = $con->query("SELECT * FROM procesos INNER JOIN nivel_madurez ON Id_madurez = FK_Id_madurez INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $row[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector] AND Id_madurez = $i");

                                        while ($rowMadDim = $sqlMadDim->fetch_array()){
                                    ?>
                                    <div id="IDiv_<?= $rowMadDim['PId'] ?>_<?= $rowMadDim['Id_madurez'] ?>" style="margin:5px; border-radius: 5px; width: 50px;"></div>
                                    <?php 
                                       }
                                    ?>
                                </td>
                                <?php 
                                    }
                                ?>
                            </tr>
                            
                        </thead>
                        

                        <?php

                            }
                        }

                        ?>


                    </tbody>
                </table>
            </div>
</div>
<div class="container" id="Informe2" style="display: none; background-color: white; background-image: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.9)), url(imagenes/wallpaper2.png); border-radius: 5px">

<!--PRIMERA PÁGINA-->
    <div class="urjc">
       <div class="row">
            <div class="col-sm-10" style="padding: 20px;">
                <button class="btn btn-dark" id="volver" style="display: none" onclick="volverDeInforme();">Volver a evaluación</button>
                <button class="btn btn-dark" id="printDiv" onclick="printDiv();">Guardar PDF</button>
            </div>
            <div class="col-sm-2" style="padding: 20px;"><img src="imagenes/Logo URJC Trabajos.png" class="img-fluid"></div>
        </div> 
    </div>
    
    <p style="font-size: 55px; text-align: center;font-weight: bold;border-top-style: solid;border-bottom-style: solid;">INFORME DE EVALUACIÓN</p>

    <div style="text-align: justify; border-color: rgba(157, 92, 99, 0.7); border-radius: 5px;padding:10px;width: 70%;">
        <hr style="width:100%; background-color:black;"/>
        <?php 
        $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
        $sql_select = mysqli_query($con,$select);
        while ($row2 = $sql_select->fetch_array()){
            $sector = $con->query("SELECT * FROM sectores_servicios WHERE Id_sector = $row2[id_sector]");
        ?>
        <p style="padding-left: 13px; font-size: 22px;"><b>Nombre de la empresa:</b> <?= $row2["Nombre_empresa"]; ?></p>
        <hr style="width:100%; background-color:black;"/>
        <?php 
                while($rowSector = $sector->fetch_array()){
                    $clientes = $con->query("SELECT * FROM clientes WHERE Id_clientes = $row2[Clientes]");
        ?>
        <p style="padding-left: 13px; font-size: 22px;"><b>Sector de la empresa:</b> <?= $rowSector["Sector"]; ?></p>
        <hr style="width:100%; background-color:black;"/>
        <?php 
                    while($rowClientes = $clientes->fetch_array()){
                        $empleados = $con->query("SELECT * FROM empleados WHERE id_empleados = $row2[ID_empleados]");
        ?>           
        <p style="padding-left: 13px; font-size: 22px;"><b>Número de clientes: </b><?= $rowClientes["rango_clientes"]; ?></p>
        <hr style="width:100%; background-color:black;"/>
        <?php 
                        while($rowEmpleados = $empleados->fetch_array()){
                            $facturacion = $con->query("SELECT * FROM facturacion WHERE id_fact = $row2[Facturación]");
        ?>           
        <p style="padding-left: 13px; font-size: 22px;"><b>Número de empleados: </b><?= $rowEmpleados["rango_empleados"]; ?></p>
        <hr style="width:100%; background-color:black;"/>
        <?php 
                            while($rowFact = $facturacion->fetch_array()){
        ?>  
        <p style="padding-left: 13px; font-size: 22px;"><b>Facturación anual: </b><?= $rowFact["rango_fact"]; ?></p>
                          
        <?php
                            }
                        }
                    }
                }
            }
        ?>
        <hr style="width:100%; background-color:black;"/>
    </div>
    
    <i style="padding-left: 10px; font-size: 30px;">Información antes de la evaluación:</i>
    <div style="background-color: rgba(233, 236, 239,0.5); border-radius: 5px; page-break-after: always;">
        <p style="padding: 10px; text-align: justify; font-size: 20px;;">Los procesos de la empresa se han evaluado en función a las dimensiones a las que pertenecen. Cada dimensión se distingue con un color específico. Cada dimensión se compone de factores clave. A su vez, estos factores están compuestos por unos procesos que son evaluados a través de unas tareas específicas dentro de la empresa.</p>
        <div style="padding: 10px; text-align: center; width: 80%; margin: auto;">
            <div class="row">
                <div class="col-sm-3" style="text-align:center"><b>DIMENSIONES Y SUS COLORES</b></div>
                <div class="col-sm-9" style="margin:auto"><?php 
                $sql2 = $con->query("SELECT * FROM dimensiones");      
                while ($row2 = $sql2->fetch_array()){ 
            ?>
            <b style="background-color: rgba(<?php echo $row2["Color_Dim"] ?>,0.5); padding: 10px; border-radius: 5px;"><?php echo $row2["Nombre"] ?></b>
            <?php 
            }
            ?></div>
                
            </div>
            

            
        </div>
        <br>
        <p style="padding: 10px; text-align: justify; font-size: 20px;;">Los procesos son los que, una vez evaluados gracias a la ponderación de sus tareas, sirven para medir el nivel de madurez de la empresa. El nivel de madurez ofrece una imagen global de la situación actual de los procesos de la empresa y lo que necesita mejorar para crecer. Se han dividido los niveles de madurez en Inmaduro, Básico, Mejorado y Excelente (también clasificados por colores según su madurez).</p>
        
        <p style="font-size: 20px; padding: 10px; text-align: justify;">Cada proceso de cada dimensión pertenece a un nivel de madurez en específico y se le evaluará con el signo "L" + "puntuación entre 1 y 3" (<i>Ejemplo: Puntuación GC0 = L2</i>). Dependiendo del promedio de cada proceso, la puntuación será más alta o baja. Para poder afirmar que la empresa se encuentra o ha superado un nivel de madurez tiene que tener en todos los procesos de ese nivel como mínimo la siguiente puntuación:</p>
        <table style="margin: auto;">
            <thead>
                <?php 
                    $sql3 = $con->query("SELECT * FROM nivel_madurez");      
                    while ($row3 = $sql3->fetch_array()){ ?>
                <th style="background-color: rgba(<?php echo $row3["color"]?>,0.4); ;padding: 10px;"><?php echo $row3["Madurez"]; ?></th>
                <?php   
            }
             ?>
            </thead>
            <tbody>
                <?php 
                    $sql3 = $con->query("SELECT * FROM nivel_madurez");      
                    while ($row3 = $sql3->fetch_array()){ ?>
                <td style="text-align: center;padding-top: 10px;">L<?php echo $row3["Resultado_minimo"]; ?></td>
                <?php   
            }
             ?>
            </tbody>
        </table>
        <br>   
    </div>
<!--SEGUNDA PÁGINA-->

    <p style="text-align: center;text-transform: uppercase; font-size: 40px; font-weight: bold; border-bottom-style:solid; margin-top: 15px;">Análisis de dimensiones y sus factores</p>

    <?php 
        $sql = $con->query("SELECT * FROM dimensiones");      
        while ($row = $sql->fetch_array()){ 
    ?>
    <div id="informeFactoresDim<?= $row["Id"] ?>" style="border-radius: 10px;background-color: rgba(<?= $row["Color_Dim"] ?>,0.1);page-break-inside: avoid;margin-top:20px;margin-bottom: 40px;">
        <br>
        <p style="border-radius: 10px; margin: auto;text-align: center; font-weight: bold; padding: 10px; width:500px;background-color: rgba(<?= $row["Color_Dim"] ?>,0.5);text-transform: uppercase;">DIMENSIÓN <?= $row["Nombre"] ?></p>
        <br>
        <div class="row">
            <div class="col-sm-7">
                <div style="width: 550px;height: 335px;"><canvas id="myCharteo8<?= $row["Id"] ?>"></canvas></div>
                
                <br>
            </div>
            
            <div class="col-sm-5" style="text-align: justify;padding-right: 25px;padding-left: 15px;">
                <p style="border-bottom-style: solid;border-color: rgba(<?= $row["Color_Dim"] ?>,0.5);text-align: center;">PROMEDIO DE LA DIMENSIÓN: <b id="promDim<?= $row['Id'] ?>"></b></p>
                El factor clave mejor ponderado de esta dimensión ha sido <b id="mejorF<?= $row["Id"] ?>"></b>. Los procesos que tiene este factor clave son:
                <ul id="procesosMF<?= $row["Id"] ?>" style="text-align: left; font-size:14px">           
                </ul>
                El factor clave peor ponderado de esta dimensión ha sido <b id="peorF<?= $row["Id"] ?>"></b>. Los procesos que tiene este factor clave son:
                <ul id="procesosPF<?= $row["Id"] ?>" style="text-align: left; font-size:14px">           
                </ul>

            </div>
        </div>
            <div class="row">
                <div class="col-sm-6" style="text-align: center;">
                    <div style="border-style: solid;border-color: rgba(<?= $row["Color_Dim"] ?>,0.5);border-radius: 5px; margin-left:20px;margin-bottom: 20px;">
                        <p style="text-align: center; font-weight: bold; color: rgba(<?= $row["Color_Dim"] ?>,1);">LEYENDA ACRÓNIMOS DE FACTORES:   </p>
                    <?php 
                        $sqlfact = $con->query("SELECT * FROM factores WHERE Id_Dimensiones=$row[Id]");      
                        while ($fact = $sqlfact->fetch_array()){ 
                    ?>
                        <p style="margin-top: 5px;margin-bottom: 5px;font-size: 13px;"><b><?= $fact["Nombre_acron"]?>:</b> <?= $fact["FNombre"] ?></p>
                    <?php 
                        }
                    ?>
                    </div>
                    
                </div>
                <div class="col-sm-6">
                    <div class="align-middle">
                        <p style="text-align: center;padding-right: 40px;padding-left: 20px; padding-top: 3px; margin-left: 10px;border-top-style: solid; border-width:2px;border-color: rgba(<?= $row["Color_Dim"] ?>,0.5);">Comentarios adicionales del evaluador:</p>
                        <textarea class="form-control" style="margin-top:5px;text-align: justify;padding-right: 25px;padding-left: 15px;width: 90%;margin-left: 20px;margin-right: 30px; margin-bottom:15px;" placeholder="Sin comentarios añadidos" rows="2"></textarea>
                    </div> 
                </div>
            </div>
    </div>
    
    <?php 
                }
            ?>

<!--TERCERA PÁGINA-->

    <p style="text-align: center;text-transform: uppercase; font-size: 40px; font-weight: bold; border-bottom-style:solid;page-break-before: always; margin-top: 15px;">Análisis del nivel de madurez</p>

    <div id="tablaMadruez2" style="background-color:rgba(255, 255, 255, 0);"></div>
    <br>
    <br>
    <p style="text-align:justify; font-size: 18px;">Como se observa en el gráfico anterior, el nivel de madurez actual de la empresa es <b id="BnivelMadurez" style="text-transform: uppercase;"></b>.</p>
    <p id="textoMad" style="text-align:justify; font-size: 18px;">En este nivel, la organización implementa procesos esenciales para la gestión de servicios en todas sus dimensiones.</p>
    <p style="text-align:justify; font-size: 18px;">Para poder acceder al siguiente nivel, debe ser capaz de mejorar la realización de los siguientes procesos:</p>
    <ul style="text-align:justify; font-size: 15px;">
        <?php 
        $sql = $con->query("SELECT * FROM procesos");      
        while ($row = $sql->fetch_array()){ 
    ?>
        <li id="HOLI<?= $row["PId"] ?>" style="display: none;"><?= $row["PId"] ?> - <?= $row["Descripción"] ?></li>
    <?php   
    }
    ?>
    </ul>
    <br>
    <p style="text-align: justify;padding-right: 25px;padding-left: 15px; margin-left: 20px;font-size: 18px;">Comentarios adicionales del evaluador:</p>
    <textarea class="form-control" style="text-align: justify;padding-right: 25px;padding-left: 15px;width: 100%;margin-bottom: 10px;margin-right: 30px" placeholder="Sin comentarios añadidos"></textarea>
    <br>
</div>

 <div id="Función"></div>

</body>
   
</html>


<script type="text/javascript">
    $(document).ready(function(){
        $('#evTablaPonderacion').load('evTablaPonderacion.php');
        
        $('#Función').load('js/JsEnPHP.php');

        $('#SubmitO').click(function(){
            $('body, html').animate({
                scrollTop: '0px'
            }, 400);

        });
        
    });

    $(document).ready(function(){
        $('#filtroCompD').click(function(){
            $('#graficos').show();
            $('#completitud_tareas').hide();
            $('#completitud_tareas_leyenda').hide();
            $('#completitud_procesos').hide();
            $('#completitud_factores').hide();
            $('#madurez_dimensiones').hide();
            $('#madurez_tabla').hide();
            $('#completitud_procesos_leyenda').hide();
                        
            $('#filtroMadDim').removeClass();
            $('#filtroMadDim').addClass('btn btn-light');

            $('#filtroMadTab').removeClass();
            $('#filtroMadTab').addClass('btn btn-light');

            $('#filtroCompFact').removeClass();
            $('#filtroCompFact').addClass('btn btn-light'); 

            $('#filtroCompD').removeClass();
            $('#filtroCompD').addClass('btn btn-dark'); 

            $('#filtroCompProc').removeClass();
            $('#filtroCompProc').addClass('btn btn-light'); 
  
            $('#filtroCompTareas').removeClass();
            $('#filtroCompTareas').addClass('btn btn-light');
        });

        $('#filtroCompTareas').click(function(){
            $('#completitud_tareas').show();
            $('#graficos').hide();
            $('#completitud_procesos').hide();
            $('#completitud_factores').hide();
            $('#madurez_dimensiones').hide();
            $('#madurez_tabla').hide();
            $('#completitud_tareas_leyenda').show();
            $('#completitud_procesos_leyenda').hide();
                        
            $('#filtroMadDim').removeClass();
            $('#filtroMadDim').addClass('btn btn-light');

            $('#filtroMadTab').removeClass();
            $('#filtroMadTab').addClass('btn btn-light');

            $('#filtroCompFact').removeClass();
            $('#filtroCompFact').addClass('btn btn-light'); 

            $('#filtroCompD').removeClass();
            $('#filtroCompD').addClass('btn btn-light'); 

            $('#filtroCompProc').removeClass();
            $('#filtroCompProc').addClass('btn btn-light'); 
  
            $('#filtroCompTareas').removeClass();
            $('#filtroCompTareas').addClass('btn btn-dark');
        });

        $('#filtroCompProc').click(function(){
            $('#graficos').hide();
            $('#completitud_tareas').hide();
            $('#completitud_procesos').show();
            $('#completitud_factores').hide();
            $('#madurez_dimensiones').hide();
            $('#completitud_tareas_leyenda').hide();
            $('#madurez_tabla').hide();
            $('#completitud_procesos_leyenda').show();
                        
            $('#filtroMadDim').removeClass();
            $('#filtroMadDim').addClass('btn btn-light');

            $('#filtroMadTab').removeClass();
            $('#filtroMadTab').addClass('btn btn-light');

            $('#filtroCompFact').removeClass();
            $('#filtroCompFact').addClass('btn btn-light'); 

            $('#filtroCompD').removeClass();
            $('#filtroCompD').addClass('btn btn-light'); 

            $('#filtroCompProc').removeClass();
            $('#filtroCompProc').addClass('btn btn-dark'); 
  
            $('#filtroCompTareas').removeClass();
            $('#filtroCompTareas').addClass('btn btn-light');
        });

        $('#filtroCompFact').click(function(){
            $('#graficos').hide();
            $('#completitud_tareas').hide();
            $('#completitud_procesos').hide();
            $('#completitud_factores').show();
            $('#madurez_dimensiones').hide();
            $('#completitud_tareas_leyenda').hide();
            $('#madurez_tabla').hide();
            $('#completitud_procesos_leyenda').hide();
                        
            $('#filtroMadDim').removeClass();
            $('#filtroMadDim').addClass('btn btn-light');

            $('#filtroMadTab').removeClass();
            $('#filtroMadTab').addClass('btn btn-light');

            $('#filtroCompFact').removeClass();
            $('#filtroCompFact').addClass('btn btn-dark'); 

            $('#filtroCompD').removeClass();
            $('#filtroCompD').addClass('btn btn-light'); 

            $('#filtroCompProc').removeClass();
            $('#filtroCompProc').addClass('btn btn-light'); 
  
            $('#filtroCompTareas').removeClass();
            $('#filtroCompTareas').addClass('btn btn-light');
        });

        $('#filtroMadDim').click(function(){
            $('#graficos').hide();
            $('#completitud_tareas').hide();
            $('#completitud_procesos').hide();
            $('#madurez_dimensiones').show();
            $('#completitud_factores').hide();
            $('#completitud_tareas_leyenda').hide();
            $('#madurez_tabla').hide();
            $('#completitud_procesos_leyenda').hide();
            
            $('#filtroMadDim').removeClass();
            $('#filtroMadDim').addClass('btn btn-dark');

            $('#filtroMadTab').removeClass();
            $('#filtroMadTab').addClass('btn btn-light');

            $('#filtroCompFact').removeClass();
            $('#filtroCompFact').addClass('btn btn-light'); 

            $('#filtroCompD').removeClass();
            $('#filtroCompD').addClass('btn btn-light'); 

            $('#filtroCompProc').removeClass();
            $('#filtroCompProc').addClass('btn btn-light'); 
  
            $('#filtroCompTareas').removeClass();
            $('#filtroCompTareas').addClass('btn btn-light');
        });

        $('#filtroMadTab').click(function(){
            $('#graficos').hide();
            $('#completitud_tareas').hide();
            $('#completitud_procesos').hide();
            $('#madurez_tabla').show();
            $('#madurez_dimensiones').hide();
            $('#completitud_factores').hide();
            $('#completitud_tareas_leyenda').hide();
            $('#completitud_procesos_leyenda').hide();
            
            $('#filtroMadDim').removeClass();
            $('#filtroMadDim').addClass('btn btn-light');

            $('#filtroMadTab').removeClass();
            $('#filtroMadTab').addClass('btn btn-dark');

            $('#filtroCompFact').removeClass();
            $('#filtroCompFact').addClass('btn btn-light'); 

            $('#filtroCompD').removeClass();
            $('#filtroCompD').addClass('btn btn-light'); 

            $('#filtroCompProc').removeClass();
            $('#filtroCompProc').addClass('btn btn-light'); 
  
            $('#filtroCompTareas').removeClass();
            $('#filtroCompTareas').addClass('btn btn-light');
        });
 
    })
</script>