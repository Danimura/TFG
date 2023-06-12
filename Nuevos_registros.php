<!DOCTYPE html>

<html lang="es">
    
<head>
    <title>Nuevo registro</title>

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

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background-image:url(imagenes/2.jpg);background-repeat:no-repeat; width:100%;background-size:cover;background-attachment: fixed;">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.7);">
      <a class="navbar-brand" href="#"><img src="imagenes/Logo URJC Trabajos.png" style="width: 100px;"></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Nuevo registro<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="BusquedaRegistros.php">Buscar empresa</a>
          </li>
        </ul>
        <div id="Titulo">NUEVO REGISTRO</div>
      </div>

    </nav>
    
        <br>
        <br>

    <div class="container" id="form" style="background-image: linear-gradient(rgba(255,255,255,0.3), rgba(255,255,255,0.4)), url(imagenes/1.jpg); background-size:cover; background-position:center;background-repeat:no-repeat;background-color: rgba(255,255,255,0.7);">

    <form id="formularioInicial" action="php/datosFormulario.php" method="POST">
        
        <label for="Enombre">Nombre de la empresa:</label><br>
        <input class="form-control" type="text" id="Enombre" name="Enombre" style="background-color:rgba(255, 255, 255,0.9);border-color: black;border-style: solid;border-width: 1px;" required><br>

        <label for="Esector">Sector al que pertenece la empresa:</label><br>
        <select class="form-control" style="background-color:rgba(255, 255, 255,0.9);
                                            border-color: black;border-style: solid;border-width: 1px;" 
            id="Esector" name="Esector">
        <?php

            include("php/bbdd.php");

 
            $sql="SELECT Id_sector,Sector FROM sectores_servicios";
            $result=mysqli_query($con,$sql);

            while ($row = $result->fetch_array()){
        ?> 

        <option> <?= $row['Sector'] ?></option>

        <?php

            }

        ?>     
        </select>
        <br>

    <div class="row">
        
        <div class="col-xs-6 col-md-4">
            <label style="padding-left:5px;" for="Etrab">Número de empleados:</label><br> 
            <div id="preg">
                <input type="radio" id="Etrab1" name="Etrab" value="1" required>
                <label for="Etrab1">Menos de 11</label><br>
                <input type="radio" id="Etrab2" name="Etrab" value="2">
                <label for="Etrab2">Entre 11 y 50</label><br>
                <input type="radio" id="Etrab3" name="Etrab" value="3">
                <label for="Etrab3">Entre 51 y 250</label><br>
            </div>
        </div>

        <div class="col-xs-6 col-md-4">
            <br>
            <label style="padding-left:5px;" for="Terc">¿Servicios tercerizados?</label><br>
            <div id="preg">
                <input type="radio" id="TercSi" name="Terc" value="Si" required>
                <label for="TercSi">Sí</label><br>
                <input type="radio" id="TercNo" name="Terc" value="No">
                <label for="TercNo">No</label>
            </div>
            <br>
        </div>

        <div class="col-xs-6 col-md-4">
        <label style="padding-left:5px;" for="Ecli">Número de clientes estimados:</label><br>
        <div id="preg">
            <input type="radio" id="Ecli1" name="Ecli" value="1" required>
            <label for="Ecli1">Menos de 100</label><br>
            <input type="radio" id="Ecli2" name="Ecli" value="2">
            <label for="Ecli2">Entre 100 y 250</label><br>
            <input type="radio" id="Ecli3" name="Ecli" value="3">
            <label for="Ecli3">Más de 250</label>
        </div>
        <br>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
        <label style="padding-left:5px;" for="Efact">Volúmen de facturación:</label><br>
        <div id="preg">
            <input type="radio" id="Efact1" name="Efact" value="1" required>
            <label for="Efact1">Menos de 30.000 €</label><br>
            <input type="radio" id="Efact2" name="Efact" value="2">
            <label for="Efact2">Entre 30.000 y 80.000 €</label><br>
            <input type="radio" id="Efact3" name="Efact" value="3" >
            <label for="Efact3">Entre 80.000 y 150.000 €</label>
        </div>
        <br>
        </div>

        <div class="col-sm-6">
            <label style="padding-left:5px;" for="Alc">Alcance de la prestación de los servicios:</label><br>
            <div id="preg">
                <input type="radio" id="Nac" name="Alc" value="Nacional" required>
                <label for="Nac">Nacional</label><br>
                <input type="radio" id="Int" name="Alc" value="Internacional">
                <label for="Int">Internacional</label><br>
                <input type="radio" id="Reg" name="Alc" value="Regional">
                <label for="Reg">Regional</label>
            </div>
            <br>
        </div>
    </div>

        <label for="Eval" style="padding-left:5px;">Se ha participado en alguna evaluación (o certificación) similar previa?</label><br>

        <select class="form-control" style="background-color:rgba(255, 255, 255,0.9);border-color: black;border-style: solid;border-width: 1px;" id="Evalif" name="Eval" onchange="valoresEval();">
            <option selected value="No, ninguna"> No, ninguna</option>
            <option value="Opción 1">Opción 1</option>
            <option value="Opción 2">Opción 2</option>
            <option value="Otro">Otro</option>          
        </select>
        <br>
        <textarea style="display: none; background-color:rgba(255, 255, 255,0.6);" class="form-control" rows="2" id="textoEvalE" name="textoEvalE" placeholder="Inserte una evaluación distinta a las ofrecidas"></textarea>
        <br>



        <label for="Modelo" style="padding-left:5px;">Se utiliza en la empresa algún marco o modelo de referencia?</label><br>
        <select class="form-control" style="background-color:rgba(255, 255, 255,0.9);border-color: black;
                                        border-style: solid;border-width: 1px;" 
            id="Modelo" name="Modelo" onchange="valoresMod();">

            <option selected value="No, ninguna"> No, ninguna</option>
            <option value="Opción 1">Opción 1</option>
            <option value="Opción 2">Opción 2</option>
            <option value="Otro">Otro</option>

        </select>
        <br>
        <textarea style="display: none; background-color:rgba(255, 255, 255,0.6);" 
            class="form-control" rows="2" id="textoModE" name="textoModE" 
            placeholder="Inserte un modelo distinto a los ofrecidos">
        </textarea>
        <br>

        <div class="inline" style="text-align: center;">
        <input type="submit" class="btn btn-dark" id="Submit" name="SubmitE" style="font-size: 20px;">
        <input type="reset" class="btn btn-warning" id="Reset" onclick="resetTextarea();" style="font-size: 20px;"><br><br>
        </div>

    </form>
    </div>
</body>

</html>

<script type="text/javascript">
    function valoresEval(){

        valor = $('#Evalif').val();

        if(valor=="Otro"){
            document.getElementById("textoEvalE").style.display="";
        } else{
            document.getElementById("textoEvalE").style.display="none";
        }
    }

    function valoresMod(){

        valor = $('#Modelo').val();

        if(valor=="Otro"){
            document.getElementById("textoModE").style.display="";
        } else{
            document.getElementById("textoModE").style.display="none";
        }
    }

    function resetTextarea(){
        document.getElementById("textoEvalE").style.display="none";
        document.getElementById("textoModE").style.display="none";
    }

</script>