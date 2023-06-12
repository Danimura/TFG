<!DOCTYPE html>
<html>
<head>
	<title>Búsqueda de empresa</title>

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
</head>

<body style="background-image: url(imagenes/2.png); background-repeat:no-repeat; width:100%;background-size:cover; background-attachment: fixed;">

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.7);">
      <a class="navbar-brand" href="#"><img src="imagenes/Logo URJC Trabajos.png" style="width: 100px;"></a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Nuevos_registros.php">Nuevo registro</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Buscar empresa<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <div id="Titulo" style="color:white;text-decoration-line: overline;border-radius: 0px;font-size: 25px;text-align: left;padding-right: 40PX;font-weight: bold;">BÚSQUEDA DE EMPRESAS</div>
      </div>


    </nav>
    
        <br>
        <br>

<div class="container" id="divBotones" style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url(imagenes/1.jpg); background-size:cover; background-position:center;background-repeat:no-repeat;background-color: rgba(255,255,255,0.7); border-radius: 15px; padding:10px; height: 600px;margin:auto; margin-top:100px;">
	
	<div class="row">

    <div class="col-sm-6" style="text-align: left;">
       <img src="imagenes/Logo URJC Trabajos.png" style="width: 200px;padding: 15px;">
    </div>

    <div class="col-sm-6" style="text-align: right; ">
      <img src="imagenes/LightSME _ LogoSinFondo.png" style="width: 200px;padding: 15px;background-color: white; border-radius:20px;">
    </div>

  </div>

	<div id="buscarEmpresaDIV" style="text-align:center;">
		<form method="POST" action="php/datosHome.php" style="margin-top:8%;">
			<label style="font-weight: bold;font-size: 30px;">BÚSQUEDA DE EMPRESAS REGISTRADAS</label>
	        <select name="ListaEmpresas" id="ListaEmpresas" class="form-control input-small" 
            style="width: 80%; margin:auto; margin-top: 10px;">
	        <?php  

	        include("php/idEmp.php");
	        $sql="SELECT * FROM formularioinicial";
	        $result=mysqli_query($con,$sql);

	        while ($row = $result->fetch_array()){
	        ?>  

	            <option><?= $row['Nombre_empresa'] ?></option>
	        
	        <?php

	        }

	        ?>

	        </select>
	        <br>
	        <input class="btn btn-danger" type="submit" name="SubmitB" value="Continuar" 
            style="padding: 10px;">
		</form>
		
        
	</div>


</div>


</body>
</html>