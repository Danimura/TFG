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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
</head>

<body style="background-image: url(imagenes/2.png); background-repeat:no-repeat; width:100%;background-size:cover;background-attachment: fixed;">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.7);">
    <a class="navbar-brand" href="#"><img src="imagenes/Logo URJC Trabajos.png" style="width: 100px;"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Registros BBDD<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <div style="color:white;text-decoration-line: overline;border-radius: 0px;font-size: 25px;text-align: left;padding-right: 40PX;font-weight: bold;">REGISTROS DE LA BASE DE DATOS</div>
    </div>


  </nav>
    
    <br>
    <br>

        <div class="container" style="background-color: white;border-radius: 10px;">           
            <br>
            <br>
            <div class="btn-group btn-group-lg flex-wrap" role="group" style="text-align: center;width: 100%;">
                <button type="button" class="btn btn-dark" id="filtroAll"><b>TODO</b></button>
                <button type="button" class="btn btn-light" id="filtroDim">Dimensiones</button>
                <button type="button" class="btn btn-light" id="filtroFac">Factores</button>
                <button type="button" class="btn btn-light" id="filtroProc">Procesos</button>
                <button type="button" class="btn btn-light" id="filtroTar">Tareas</button>
                <button type="button" class="btn btn-light" id="filtroSec">Sectores</button>
                <button type="button" class="btn btn-light" id="filtroSecPiv">Sectores Pivote</button>
                <button type="button" class="btn btn-light" id="filtroMad">Madurez</button>
            </div>
            <br>
            <br>
            <div class="container" >
                <div id="tabla" style="padding-right: 25px; width:100%;"></div>
                <div id="tabla2" style="padding-right: 25px; width:100%;"></div>
                <div id="tabla3" style="padding-right: 25px; width:100%;"></div>
                <div id="tabla4" style="padding-right: 25px; width:100%;"></div>
                <div id="tabla5" style="padding-right: 25px; width:100%;"></div>
                <div id="tabla6" style="padding-right: 25px; width:100%;"></div>
                <div id="tabla7" style="padding-right: 25px; width:100%;"></div>
            </div>
            
 <!-- Modal para registros nuevos DIMENSIONES -->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

              <label>Nombre</label>
              <input type="text" name="" id="nombre" class="form-control input-small">
              <br>
              <label>Color de la dimensión</label>
              <input type="color" class="form-control form-control-color" id="colorD" value="#ff0000">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="guardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para edición DIMENSIONES -->
    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
          <div class="modal-body">

              <input type="text" hidden="" id="idnombre" name="idnombre">
              <label>Nombre</label>
              <input type="text" name="nombreE" id="nombreE" class="form-control input-small">
              <br>
              <label>Color de la dimensión</label>
              <input type="color" class="form-control form-control-color" name="colorDE" id="colorDE">

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="actualizarDatos">Actualizar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para registros nuevos FACTORES -->
    <div class="modal fade" id="modalNuevoF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

            <label>Nombre</label>
            <input type="text" name="" id="Fnombre" class="form-control input-small"><br>
            <label>Dimensión</label>
            <select name="" id="Fdimension" class="form-control input-small">
            <?php  

            include("php/bbdd.php");
            $sql="SELECT Id,Nombre FROM dimensiones";
            $result=mysqli_query($con,$sql);

            while ($row = $result->fetch_array()){
            ?>  

                <option><?= $row['Nombre'] ?></option>
            
            <?php

            }

            ?>

            </select>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="FguardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para edición FACTORES -->
    <div class="modal fade" id="modalEdicionF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
        <div class="modal-body">

            <input type="text" hidden="" id="Fidnombre" name="Fidnombre">
            <label>Nombre</label>
            <input type="text" name="" id="FnombreE" class="form-control input-small"><br>   
            <label>Dimensión</label>           
            <select name="" id="FdimensionE" class="form-control input-small"><br>
            <?php 
            include("php/bbdd.php");
            $sql_editar = "SELECT Nombre FROM dimensiones";
            $result_editar = mysqli_query($con,$sql_editar);
            while($row_editar = $result_editar->fetch_array()){ ?>h
                <option><?= $row_editar['Nombre'] ?></option>
            <?php
            }
            ?>
            </select>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="FactualizarDatos">Actualizar</button>
        </div>
    </div>

</div>
</div>

    <!-- Modal para registros nuevos PROCESOS -->
    <div class="modal fade" id="modalNuevoP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <label>Id</label>
            <input type="text" name="" id="PId" class="form-control input-small"><br>
            <label>Nombre</label>
            <input type="text" name="" id="Pnombre" class="form-control input-small"><br>
            <label>Factor</label>
            <select name="" id="Pfactor" class="form-control input-small">
            <?php  

            include("php/bbdd.php");
            $sql="SELECT FId,FNombre FROM factores";
            $result=mysqli_query($con,$sql);

            while ($row = $result->fetch_array()){
            ?>  

                <option><?= $row['FNombre'] ?></option>
            
            <?php

            }

            ?>

            </select><br>
            <label>Nivel del tipo de empresa</label>
            <select name="" id="Ptipo" class="form-control input-small">
            <?php  

            include("php/bbdd.php");
            $sql2="SELECT * FROM tipo_empresa";
            $result2=mysqli_query($con,$sql2);

            while ($row2 = $result2->fetch_array()){
            ?>  

                <option><?= $row2['Descripcion_empresa'] ?></option>
            
            <?php

            }

            ?>

            </select>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="PguardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para edición PROCESOS -->
    <div class="modal fade" id="modalEdicionP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
        <div class="modal-body">

            <input type="text" hidden="" id="Pidnombre" name="Pidnombre">
            <label>Nombre</label>
            <input type="text" name="" id="PnombreE" class="form-control input-small"><br>   
            <label>Factor</label>
            <select name="" id="PfactorE" class="form-control input-small"><br>
            <?php 
            include("php/bbdd.php");
            $sql_editar = "SELECT FNombre FROM factores";
            $result_editar = mysqli_query($con,$sql_editar);
            while($row_editar = $result_editar->fetch_array()){ ?>
                <option><?= $row_editar['FNombre'] ?></option>
            <?php
            }
            ?>
            </select><br>
            <label>Dimensión</label>
            <select name="" id="PdimE" class="form-control input-small" disabled>
            <?php 
            include("php/bbdd.php");
            $sql_editar2 = "SELECT Nombre FROM dimensiones";
            $result_editar2 = mysqli_query($con,$sql_editar2);
            while($row_editar2 = $result_editar2->fetch_array()){ ?>
                <option><?= $row_editar2['Nombre'] ?></option>
            <?php
            }
            ?>

            </select><br>
            <label>Nivel del tipo de empresa</label>
            <select name="" id="PtipoE" class="form-control input-small">
            <?php  

            include("php/bbdd.php");
            $sql3="SELECT * FROM tipo_empresa";
            $result3=mysqli_query($con,$sql3);

            while ($row3 = $result3->fetch_array()){
            ?>  

                <option><?= $row3['Descripcion_empresa'] ?></option>
            
            <?php

            }

            ?>

            </select>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="PactualizarDatos">Actualizar</button>
        </div>
    </div>

</div>
</div>

    <!-- Modal para registros nuevos TAREAS -->
    <div class="modal fade" id="modalNuevoT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <label>Código</label>
            <input type="text" name="" id="TId" class="form-control input-small"><br>
            <label>Descripción</label>
            <input type="text" name="" id="Tnombre" class="form-control input-small"><br>
            <label>Proceso</label>
            <select name="" id="Tproceso" class="form-control input-small">
            <?php  

            include("php/bbdd.php");
            $sqlt="SELECT PId,Descripción FROM procesos";
            $tresult=mysqli_query($con,$sqlt);

            while ($trow = $tresult->fetch_array()){
            ?>  

                <option><?= $trow['Descripción'] ?></option>
            
            <?php

            }

            ?>

            </select>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="TguardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para edición TAREAS -->
    <div class="modal fade" id="modalEdicionT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
        <div class="modal-body">

            <input type="text" hidden="" id="Tidnombre" name="Tidnombre">
            <label>Nombre</label>
            <input type="text" name="" id="TnombreE" class="form-control input-small"><br>   
            <label>Proceso</label>
            <select name="" id="TprocesoE" class="form-control input-small"><br>
            <?php 
            include("php/bbdd.php");
            $tsql_editar = "SELECT Descripción FROM procesos";
            $tresult_editar = mysqli_query($con,$tsql_editar);
            while($trow_editar = $tresult_editar->fetch_array()){ ?>
                <option><?= $trow_editar['Descripción'] ?></option>
            <?php
            }
            ?>
            </select>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="TactualizarDatos">Actualizar</button>
        </div>
    </div>

</div>
</div>

    <!-- Modal para registros nuevos SERVICIOS -->
    <div class="modal fade" id="modalNuevoS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

            <label>Nombre del Sector</label>
            <input type="text" name="" id="Snombre" class="form-control input-small"><br>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="SguardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para edición SERVICIOS -->
    <div class="modal fade" id="modalEdicionS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
        <div class="modal-body">

            <input type="text" hidden="" id="Sidnombre" name="Sidnombre">
            <label>Nombre del Sector</label>
            <input type="text" name="" id="SnombreE" class="form-control input-small"><br>   

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="SactualizarDatos">Actualizar</button>
        </div>
    </div>

</div>
</div>

    <!-- Modal para registros nuevos SERVICIOS PIVOTE -->
    <div class="modal fade" id="modalNuevoSP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

            <label>Nombre del Sector</label>
            <select name="" id="SPnombre" class="form-control input-small"><br>
            <?php 
            include("php/bbdd.php");
            $spn_sql = "SELECT * FROM sectores_servicios";
            $spn_result = mysqli_query($con,$spn_sql);
            while($spn_row = $spn_result->fetch_array()){ ?>
                <option><?= $spn_row['Sector'] ?></option>
            <?php
            }
            ?>
            </select>
            <br>

            <label>Nombre del Proceso asociado</label>
            <select name="" id="SPproceso" class="form-control input-small" ><br>
            <?php 
            include("php/bbdd.php");
            $sp_sql = "SELECT Descripción FROM procesos";
            $sp_result = mysqli_query($con,$sp_sql);
            while($sp_row = $sp_result->fetch_array()){ ?>
                <option><?= $sp_row['Descripción'] ?></option>
            <?php
            }
            ?>
            </select>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="SPguardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para edición SERVICIOS PIVOTE -->
    <div class="modal fade" id="modalEdicionSP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
        <div class="modal-body">

            <input type="text" hidden="" id="SPidnombre" name="Sidnombre">
            <label>Nombre del Sector</label>
            <select name="" id="SPnombreE" class="form-control input-small"><br>
            <?php 
            include("php/bbdd.php");
            $spn_sql_e = "SELECT * FROM sectores_servicios";
            $spn_result_e = mysqli_query($con,$spn_sql_e);
            while($spn_row_e = $spn_result_e->fetch_array()){ ?>
                <option><?= $spn_row_e['Sector'] ?></option>
            <?php
            }
            ?>
            </select>
            <br>

            <label>Nombre del Proceso asociado</label>
            <select name="" id="SPprocesoE" class="form-control input-small" ><br>
            <?php 
            include("php/bbdd.php");
            $sp_sql_e2 = "SELECT Descripción FROM procesos";
            $sp_result_e2 = mysqli_query($con,$sp_sql_e2);
            while($sp_row_e2 = $sp_result_e2->fetch_array()){ ?>
                <option><?= $sp_row_e2['Descripción'] ?></option>
            <?php
            }
            ?>
            </select>   

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="SPactualizarDatos">Actualizar</button>
        </div>
    </div>

    </div>
    </div>

    <!-- Modal para registros nuevos MADUREZ -->
            <div class="modal fade" id="modalNuevoMAD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Agregar nuevos datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
                <div class="modal-body">

                    <label>Nombre del nivel de madurez</label>
                    <input type="text" name="" id="nombreMAD" class="form-control input-small">
                    <br>
                    <label>Resultado mínimo que deben tener los procesos que tiene el nivel</label>
                    <select class="form-control" id="valorMAD">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                    <br>
                    <label>Color del nivel de madurez</label>
                    <input type="color" class="form-control form-control-color" id="colorMAD" value="#ff0000">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="MADguardarNuevo">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para edición MADUREZ -->
    <div class="modal fade" id="modalEdicionMAD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
          </div>
          <div class="modal-body">

              <input type="text" hidden="" id="idmadurezE" name="idmadureze">
              <label>Nombre</label>
              <input type="text" name="nombreE" id="madurezE" class="form-control input-small">
              <br>
              <label>Resultado mínimo que deben tener los procesos que tiene el nivel</label>
                    <select class="form-control" id="valorMADE">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
              <br>
              <label>Color del nivel de madurez</label>
              <input type="color" class="form-control form-control-color" name="colorMADE" id="colorMADE" value="#ff0000">

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="MADactualizarDatos">Actualizar</button>
          </div>
        </div>
      </div>
    </div>


</div>
<br>

</body>

</html>
<script src="js/funciones.js"></script> 



<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('tablas/tabla.php');
        $('#tabla2').load('tablas/tabla2.php');
        $('#tabla3').load('tablas/tabla3.php');
        $('#tabla4').load('tablas/tabla4.php');
        $('#tabla5').load('tablas/tabla5.php');
        $('#tabla6').load('tablas/tabla6.php');
        $('#tabla7').load('tablas/tabla7.php');   
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#guardarNuevo').click(function(){

            nombre = $('#nombre').val();
            color = $('#colorD').val();
            var red = parseInt(color[1]+color[2],16);
            var green = parseInt(color[3]+color[4],16);
            var blue = parseInt(color[5]+color[6],16);
            colorD = red + ", " + green + ", " + blue;
            agregardatos(nombre,colorD);

        });


        $('#actualizarDatos').click(function(){

            actualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#FguardarNuevo').click(function(){

            Fnombre = $('#Fnombre').val();
            Fdimension = $('#Fdimension').val();
            Fagregardatos(Fnombre,Fdimension);

        });


        $('#FactualizarDatos').click(function(){

            FactualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#PguardarNuevo').click(function(){

            PId = $('#PId').val();
            Pnombre = $('#Pnombre').val();
            Pfactor = $('#Pfactor').val();
            Ptipo = $('#Ptipo').val();
            Pagregardatos(PId,Pnombre,Pfactor,Ptipo);

        });


        $('#PactualizarDatos').click(function(){

            PactualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#TguardarNuevo').click(function(){

            TId = $('#TId').val();
            Tnombre = $('#Tnombre').val();
            Tproceso = $('#Tproceso').val();
            Tagregardatos(TId,Tnombre,Tproceso);

        });


        $('#TactualizarDatos').click(function(){

            TactualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#SguardarNuevo').click(function(){

            Snombre = $('#Snombre').val();
            Sagregardatos(Snombre);

        });


        $('#SactualizarDatos').click(function(){

            SactualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#SPguardarNuevo').click(function(){

            SPnombre = $('#SPnombre').val();
            SPproceso = $('#SPproceso').val();
            SPagregardatos(SPnombre,SPproceso);

        });


        $('#SPactualizarDatos').click(function(){

            SPactualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#MADguardarNuevo').click(function(){

            nombreM = $('#nombreMAD').val();
            valorM = $('#valorMAD').val();
            color = $('#colorMAD').val();
            var red = parseInt(color[1]+color[2],16);
            var green = parseInt(color[3]+color[4],16);
            var blue = parseInt(color[5]+color[6],16);
            colorM = red + ", " + green + ", " + blue;
            MADagregardatos(nombreM,valorM,colorM);

        });


        $('#MADactualizarDatos').click(function(){

            MADactualizaDatos();

        })

    });

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#filtroDim').click(function(){
            $('#tabla').show();
            $('#tabla2').hide();
            $('#tabla3').hide();
            $('#tabla4').hide();
            $('#tabla5').hide();
            $('#tabla6').hide();
            $('#tabla7').hide();
            
            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-dark');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');

        });

        $('#filtroFac').click(function(){
            $('#tabla').hide();
            $('#tabla2').show();
            $('#tabla3').hide();
            $('#tabla4').hide();
            $('#tabla5').hide();
            $('#tabla6').hide();
            $('#tabla7').hide();
            
            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-dark'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');

        });

        $('#filtroAll').click(function(){
            $('#tabla').show();
            $('#tabla2').show();
            $('#tabla3').show();
            $('#tabla4').show();
            $('#tabla5').show();
            $('#tabla6').show();
            $('#tabla7').hide();

            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-dark');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');

        });

        $('#filtroProc').click(function(){
            $('#tabla').hide();
            $('#tabla2').hide();
            $('#tabla3').show();
            $('#tabla4').hide();
            $('#tabla5').hide();
            $('#tabla6').hide();
            $('#tabla7').hide();

            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-dark'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');

        });

        $('#filtroTar').click(function(){
            $('#tabla').hide();
            $('#tabla2').hide();
            $('#tabla3').hide();
            $('#tabla4').show();
            $('#tabla5').hide();
            $('#tabla6').hide();
            $('#tabla7').hide();
            
            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-dark'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');

        });

        $('#filtroSec').click(function(){
            $('#tabla').hide();
            $('#tabla2').hide();
            $('#tabla3').hide();
            $('#tabla4').hide();
            $('#tabla5').show();
            $('#tabla6').hide();
            $('#tabla7').hide();
            
            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-dark'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');


        });

        $('#filtroSecPiv').click(function(){
            $('#tabla').hide();
            $('#tabla2').hide();
            $('#tabla3').hide();
            $('#tabla4').hide();
            $('#tabla5').hide();
            $('#tabla6').show();
            $('#tabla7').hide();
            
            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-dark');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-light');


        });

        $('#filtroMad').click(function(){
            $('#tabla').hide();
            $('#tabla2').hide();
            $('#tabla3').hide();
            $('#tabla4').hide();
            $('#tabla5').hide();
            $('#tabla6').hide();
            $('#tabla7').show();
            
            $('#filtroAll').removeClass();
            $('#filtroAll').addClass('btn btn-light');

            $('#filtroDim').removeClass();
            $('#filtroDim').addClass('btn btn-light');

            $('#filtroFac').removeClass();
            $('#filtroFac').addClass('btn btn-light'); 

            $('#filtroProc').removeClass();
            $('#filtroProc').addClass('btn btn-light'); 

            $('#filtroTar').removeClass();
            $('#filtroTar').addClass('btn btn-light'); 

            $('#filtroSec').removeClass();
            $('#filtroSec').addClass('btn btn-light'); 
  
            $('#filtroSecPiv').removeClass();
            $('#filtroSecPiv').addClass('btn btn-light');

            $('#filtroMad').removeClass();
            $('#filtroMad').addClass('btn btn-dark');

        });
    })
</script>

