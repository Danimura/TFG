<script type="text/javascript">
<?php 
include("../php/idEmp.php");
?>

function cambio(){

let hora = document.getElementById("ListaVersiones").value;
<?php


$select3 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
$sql_select3 = mysqli_query($con,$select3);

//centramos la empresa que queremos
while ($row5 = $sql_select3->fetch_array()){
    $tar = $con->query("SELECT * FROM tareas");

//bucle de código tantas veces como exista la condición del while
    while($rowTar = $tar->fetch_array()) {
?>  
        var radios1 = document.getElementsByName("Ta_<?= $rowTar['Id_Tareas'] ?>");

        for (var i = 0 ; i < radios1.length ; i++) {
            if (radios1[i].checked) {
                document.getElementById("<?= $rowTar['Codigo'] ?>_" + i).checked = false;
                document.getElementById("<?= $rowTar['Codigo'] ?>_textarea").value = "";            
            } 
        }       
<?php
    }
        $pond = $con->query("SELECT * FROM ponderacion INNER JOIN tareas ON Cod_Tar = Codigo WHERE Id_emp = $row5[Id_empresa]");
        while($rowPond = $pond->fetch_array()) {
?>          
            if(hora=="<?= $rowPond['Hora'] ?>"){              
                document.getElementById("<?= $rowPond['Codigo'] ?>_<?= $rowPond["Ponderacion"] ?>").checked = true;
                document.getElementById("<?= $rowPond['Codigo'] ?>_textarea").value = "<?= $rowPond['Comentarios'] ?>";
            }                          
<?php                 
        }
    }
?>
}



const classes = document.getElementsByClassName("nav-link disabled");
document.getElementById("SubmitO").addEventListener("click", myfunction);

function myfunction(){


document.getElementById("filtroComp").style.display="block";
document.getElementById("graficos").style.display="block";
document.getElementById("contenedorEv").style.display="none";
document.getElementById("ListaEmp").style.display="none";
document.getElementById("nombreEmp").style.display="none";
classes[0].setAttribute("class", "nav-link");

<?php 
        


        $dimensiones = $con->query("SELECT * FROM dimensiones");
?>

<?php
        //bucle por dimensiones
        while ($row19 = $dimensiones->fetch_array()){

            $factores = $con->query("SELECT * FROM factores INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id_Dimensiones = $row19[Id]");

    ?>
            let FactoresxDimension<?= $row19['Id'] ?> = {};
            let factoresArray<?= $row19['Id'] ?> = Object.values(FactoresxDimension<?= $row19['Id'] ?>);

            let FactoresxDimension2<?= $row19['Id'] ?> = {};
            let factoresArray2<?= $row19['Id'] ?> = Object.values(FactoresxDimension<?= $row19['Id'] ?>);

            
            
            var i<?= $row19['Id'] ?> = 1;

//Gráfico por dimensiones del informe

const ctx8<?= $row19['Id'] ?> = document.getElementById('myCharteo8<?= $row19['Id'] ?>').getContext('2d');

    const myCharteo8<?= $row19['Id'] ?> = new Chart(ctx8<?= $row19['Id'] ?>, {
        type: 'bar',
        data: {
            labels: ["<?= $row19['Nombre'] ?>"],
            datasets: [{
                label: 'Dimensión <?= $row19['Nombre'] ?>(%)',
                data: [],
                backgroundColor: ['rgba(<?= $row19["Color_Dim"] ?>,0.3)'],
                borderColor: ['rgba(<?= $row19["Color_Dim"] ?>,1)'],
                borderWidth: 1,
                grouped: false,
                order: 0,
                categoryPercentage: 0.9,
                datalabels: {
                    display: false,
                },
            },
            <?php $sql = $con->query("SELECT * FROM factores INNER JOIN dimensiones ON Id_dimensiones = Id WHERE Id = $row19[Id]");      
                    while ($row = $sql->fetch_array()){  ?>
            {
                label: '<?= $row["Nombre_acron"] ?>',
                data: [],
                backgroundColor: ['rgba(<?= $row19["Color_Dim"] ?>,0.8)'],
                borderColor: ['rgba(<?= $row19["Color_Dim"] ?>,1)'],
                borderWidth: 1,
                categoryPercentage: 0.7,
                barPercentage: 0.6,
                datalabels: {
                    formatter: (value,context)=> {
                        if(isNaN(value)){
                            return '';
                        } else {
                            return context.dataset.label + ": " + Math.round(value) + " %";
                        }
                    },
                },
            },
            <?php 
}
             ?>]
        }, 

        options: {
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    color: 'black',
                    anchor: 'end',
                    align: 'top',
                },
                legend: {
                    display: false
                },
            },
            borderRadius: 4,
            scales: {
                y: {
                    max:100,
                    beginAtZero:true,
                    ticks: {
                        callback: (value) => {
                            return `${value} %`;
                        }
                    },
                }
            },
            layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 30,
                            bottom: 0
                        }
                    },
        },
        plugins: [ChartDataLabels],
    });

//
    
    <?php
            //bucle por factores de cada dimensión
            while ($row20 = $factores->fetch_array()){
                $select3 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                $sql_select3 = mysqli_query($con,$select3);
                while ($row5 = $sql_select3->fetch_array()){
                    $procesos = $con->query("SELECT * FROM procesos INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id_Factores = $row20[FId] AND Id_tipoempresa <= $row5[Id_tipo_empresa]");
                }
        ?>
                let ProcesosxFactor<?= $row20['FId'] ?> = {};
                let procesosArray<?= $row20['FId'] ?> = Object.values(ProcesosxFactor<?= $row20['FId'] ?>);


//Gráficos de los factores de la fase 1

const ctx<?= $row20['FId'] ?> = document.getElementById('myChart<?= $row20['FId'] ?>').getContext('2d');

    const myChart<?= $row20['FId'] ?> = new Chart(ctx<?= $row20['FId'] ?>, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Ponderación realizada (%)',
                data: [],
                backgroundColor: [],
                borderColor: [],
                borderWidth: 1,
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    max:100,
                    beginAtZero:true,
                    ticks: {
                        callback: (value, index, values) => {
                            return `${value} %`;
                        }
                    }
                }
            }
        }
    });

//


        <?php
                //Bucle de los procesos de cada factor
                while ($row21 = $procesos->fetch_array()){

                    $selecciona = $con->query("SELECT * FROM tareas INNER JOIN procesos ON Id_Procesos = PId INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id_Procesos = '$row21[PId]' ");
        ?>
                    
                    let TareasxProceso<?= $row21['PId'] ?> = {};
                    let tareasArray<?= $row21['PId'] ?> = Object.values(TareasxProceso<?= $row21['PId'] ?>);

                    

        <?php
                    //Bucle de las tareas de cada proceso
                    while ($row22 = $selecciona->fetch_array()){
        ?>


                        //Archivar los valores seleccionados de cada tarea y su comentario
                        var radios = document.getElementsByName("Ta_<?php echo $row22['Id_Tareas'] ?>");
                        for (var i = 0 ; i < radios.length ; i++) {
                            if (radios[i].checked) {
                                var tarea<?= $row22['Id_Tareas'] ?> = radios[i].value;
                                var dato<?= $row22['Id_Tareas'] ?> = parseInt(tarea<?= $row22['Id_Tareas']; ?>);
                                var añadir = tareasArray<?= $row21['PId'] ?>.push(dato<?= $row22['Id_Tareas'] ?>);                               
                            } 
                        }
                        
                        let comentario<?= $row22['Id_Tareas'] ?> = document.getElementById("<?= $row22['Codigo'] ?>_textarea").value;
                        var NombreTar = "T_<?php echo $row22['Id_Tareas']; ?>";

                        //Asigna el nivel de tarea
                        if (tarea<?= $row22['Id_Tareas'] ?>==0){
                            document.getElementById(NombreTar).style.backgroundColor= "rgba(211, 77, 77, 0.7)";
                            document.getElementById(NombreTar).innerHTML="Nivel 0: No cumple";
                        } else if (tarea<?= $row22['Id_Tareas'] ?>==1){
                            document.getElementById(NombreTar).style.backgroundColor= "rgba(243, 162, 52, 0.7)";
                            document.getElementById(NombreTar).innerHTML="Nivel 1: Cumple parcialmente";
                        } else if (tarea<?= $row22['Id_Tareas'] ?>==2){
                            document.getElementById(NombreTar).style.backgroundColor= "rgba(89, 222, 127, 0.7)";
                            document.getElementById(NombreTar).innerHTML="Nivel 2: Cumple totalmente";
                        }


                    <?php

                    }
                    ?>
                    //Suma todas las tareas del proceso y hace su prmedio
                    let suma<?= $row21['PId'] ?> = tareasArray<?= $row21['PId'] ?>.reduce((a, b) => a + b, 0);
                    var promedio<?= $row21['PId'] ?> = (suma<?= $row21['PId'] ?> / tareasArray<?= $row21['PId'] ?>.length) / 2 * 100;
                    var promedioFixed<?= $row21['PId'] ?> = promedio<?= $row21['PId'] ?>.toFixed(2);

                    var NombreProc = "P_<?php echo $row21['IdProcesos']; ?>";
                    var NombreProcR = "PR_<?php echo $row21['IdProcesos']; ?>";

                    document.getElementById(NombreProc).innerHTML = promedioFixed<?= $row21['PId'] ?> + " %";

                    //Niveles de promedio y valor L para modelo de madurez
                    var L<?= $row21['PId'] ?>;

                    if (promedio<?= $row21['PId'] ?><=15){
                        document.getElementById(NombreProc).style.backgroundColor= "rgba(211, 77, 77, 0.7)";
                        document.getElementById(NombreProcR).innerHTML="Objetivo no alcanzado";
                        document.getElementById(NombreProcR).style.backgroundColor= "rgba(211, 77, 77, 0.7)";
                        L<?= $row21['PId'] ?> = 0;
                    } else if(promedio<?= $row21['PId'] ?>>15&&promedio<?= $row21['PId'] ?><=50){
                        document.getElementById(NombreProc).style.backgroundColor= "rgba(243, 162, 52, 0.7)";
                        document.getElementById(NombreProcR).innerHTML="Objetivo alcanzado parcialmente";
                        document.getElementById(NombreProcR).style.backgroundColor= "rgba(243, 162, 52, 0.7)";
                        L<?= $row21['PId'] ?> = 1;
                    } else if(promedio<?= $row21['PId'] ?>>50&&promedio<?= $row21['PId'] ?><=85){
                        document.getElementById(NombreProc).style.backgroundColor= "rgba(244, 208, 63, 0.5)";
                        document.getElementById(NombreProcR).innerHTML="Objetivo alcanzado ampliamente";
                        document.getElementById(NombreProcR).style.backgroundColor= "rgba(244, 208, 63, 0.5)";
                        L<?= $row21['PId'] ?> = 2;
                    } else if(promedio<?= $row21['PId'] ?>>85){
                        document.getElementById(NombreProc).style.backgroundColor= "rgba(89, 222, 127, 0.7)";
                        document.getElementById(NombreProcR).innerHTML="Objetivo alcanzado totalmente";
                        document.getElementById(NombreProcR).style.backgroundColor= "rgba(89, 222, 127, 0.7)";
                        L<?= $row21['PId'] ?> = 3;
                    } else if(isNaN(promedio<?= $row21['PId'] ?>)){
                        promedioFixed<?= $row21['PId'] ?> = 0;
                        document.getElementById(NombreProc).innerHTML = "";
                    }

                    var añadirProceso = procesosArray<?= $row20['FId'] ?>.push(promedio<?= $row21['PId'] ?>);
                    
                    myChart<?= $row20['FId'] ?>.data.datasets[0].data.push(promedioFixed<?= $row21['PId'] ?>);
                    myChart<?= $row20['FId'] ?>.data.labels.push("<?= $row21['PId'] ?>");
                    
                    //Asignar color dependiendo de la dimensión
                    myChart<?= $row20['FId'] ?>.data.datasets[0].backgroundColor.push("rgba(<?= $row20['Color_Dim'] ?>, 0.3)");
                    myChart<?= $row20['FId'] ?>.data.datasets[0].borderColor.push("rgba(<?= $row20['Color_Dim'] ?>, 1)");


                    myChart<?= $row20['FId'] ?>.update();
                    
                <?php
                }
                ?>
            //Suma de procesos de cada factor y sacar promedio
            let sumaF<?= $row20['FId'] ?> = procesosArray<?= $row20['FId'] ?>.reduce((a, b) => a + b, 0);
            var promedioF<?= $row20['FId'] ?> = (sumaF<?= $row20['FId'] ?> / procesosArray<?= $row20['FId'] ?>.length);
            var promedioFFixed<?= $row20['FId'] ?> = promedioF<?= $row20['FId'] ?>.toFixed(2);  

            if(isNaN(promedioFFixed<?= $row20['FId'] ?>)){
                promedioFFixed<?= $row20['FId'] ?> = 0;
            }

            document.getElementById(<?= $row20['FId'] ?>).innerHTML= promedioFFixed<?= $row20['FId'] ?> + " %";

            var añadirFactor = factoresArray<?= $row19['Id'] ?>.push(promedioF<?= $row20['FId'] ?>);
            var añadirFactor2 = factoresArray2<?= $row19['Id'] ?>.push({nombre:"<?= $row20['FNombre'] ?>",valor:promedioFFixed<?= $row20['FId'] ?>});
            var sortArray = factoresArray2<?= $row19['Id'] ?>.sort(function(a,b){return b.valor-a.valor});

            // Comentarios de procesos de mejor y peor factor de cada dimensión en el informe
            if(sortArray[0].nombre == "<?= $row20['FNombre'] ?>"){
                document.getElementById("procesosMF<?= $row19['Id'] ?>").innerHTML=<?php
                    $select3 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                    $sql_select3 = mysqli_query($con,$select3);
                    while ($row5 = $sql_select3->fetch_array()){
                        $procesos = $con->query("SELECT * FROM procesos INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id_Factores = $row20[FId] AND Id_tipoempresa <= $row5[Id_tipo_empresa]");
                    }
                    ?>"<?php while ($row6 = $procesos->fetch_array()){ ?><li><?= $row6["PId"] ?> - <?= $row6["Descripción"] ?></li><?php
                    }
                    ?>";       
            } else if(sortArray[sortArray.length - 1].nombre =="<?= $row20['FNombre'] ?>"){
                document.getElementById("procesosPF<?= $row19['Id'] ?>").innerHTML=<?php
                    $select3 = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
                    $sql_select3 = mysqli_query($con,$select3);
                    while ($row5 = $sql_select3->fetch_array()){
                        $procesos = $con->query("SELECT * FROM procesos INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id_Factores = $row20[FId] AND Id_tipoempresa <= $row5[Id_tipo_empresa]");
                    }
                    ?>"<?php while ($row6 = $procesos->fetch_array()){ ?><li><?= $row6["PId"] ?> - <?= $row6["Descripción"] ?></li><?php
                    }
                    ?>";       
            }
                   

            
            
            myCharteo8<?= $row19['Id'] ?>.data.datasets[i<?= $row19['Id'] ?>].data.push(promedioFFixed<?= $row20['FId'] ?>);
            i<?= $row19['Id'] ?> = i<?= $row19['Id'] ?>+1;
            
            
               

            <?php
            }
            ?>

        document.getElementById("mejorF<?= $row19['Id'] ?>").innerHTML = sortArray[0].nombre;

        document.getElementById("peorF<?= $row19['Id'] ?>").innerHTML = sortArray[sortArray.length - 1].nombre;

        //Suma de los factores de cada dimensión y promedio
        let sumaD<?= $row19['Id'] ?> = factoresArray<?= $row19['Id'] ?>.reduce((a, b) => a + b, 0);
        var promedioD<?= $row19['Id'] ?> = (sumaD<?= $row19['Id'] ?> / factoresArray<?= $row19['Id'] ?>.length);
        var promedioDFixed<?= $row19['Id'] ?> = promedioD<?= $row19['Id'] ?>.toFixed(2);

        if(isNaN(promedioDFixed<?= $row19['Id'] ?>)){
            promedioDFixed<?= $row19['Id'] ?> = 0;
            
        }

        //Actualización de datos de dimensión
        myCharteo8<?= $row19['Id'] ?>.data.datasets[0].data.push(promedioDFixed<?= $row19['Id'] ?>);
        myCharteo8<?= $row19['Id'] ?>.update();

        document.getElementById("D_<?= $row19['Id'] ?>").innerHTML= promedioDFixed<?= $row19['Id'] ?> + " %";
        document.getElementById("promDim<?= $row19['Id'] ?>").innerHTML = promedioDFixed<?= $row19['Id'] ?> + " %";
        document.getElementById("D_<?= $row19['Id'] ?>").style.backgroundColor= "rgba(<?= $row19['Color_Dim'] ?>, 0.3)";

        myChartMadurez.data.datasets[0].data.push(promedioDFixed<?= $row19['Id'] ?>);
        myChartMadurez.update();

        <?php
        }
        ?>

//Condicional para ver si se repite la ponderación para ver si subirlo a la base de datos o no
var tipoEmpresa = <?= $tipoEmpresa[0] ?>;
let hora = document.getElementById("ListaVersiones").value;

<?php
    $sqlHora = $con->query("SELECT * FROM ponderacion_pivote WHERE Id_empresa_pivote = $tipoEmpresa[0]");
    while($rowHora = $sqlHora->fetch_array()){
?>

    if('<?= $rowHora["ID_Hora"]?>'== hora){

        if(<?php $sql = $con->query("SELECT * FROM tareas INNER JOIN ponderacion ON Codigo = Cod_Tar WHERE Hora = '$rowHora[ID_Hora]'"); while($row = $sql->fetch_array()){?>dato<?=$row["Id_Tareas"]?> == <?= $row["Ponderacion"] ?> && comentario<?=$row["Id_Tareas"]?> == '<?= $row["Comentarios"] ?>' && <?php } ?>tipoEmpresa == <?= $tipoEmpresa[0] ?>){

            alertify.warning("Ya existen datos iguales a los introducidos");

        } else {

                $(document).ready(function(){
            
                    cadena = "dato1=" + dato1 + "&comentario1=" + comentario1 + <?php $sql = $con->query("SELECT * FROM tareas WHERE Id_Tareas > 1");
                                    while ($row = $sql->fetch_array()){?>"&dato<?=$row["Id_Tareas"]?>=" + dato<?=$row["Id_Tareas"]?> + "&comentario<?= $row['Id_Tareas'] ?>=" + comentario<?= $row['Id_Tareas'] ?> + <?php } ?> "&tipoEmpresa=" + tipoEmpresa;
                    $.ajax({
                        type: "POST",
                        url:"php/datosEvaluación.php",
                        data:cadena,
                        success: alertify.success("Datos introducidos"),
                    });
                })

                }


    }
<?php
    }
?>
    if(hora=="Nada"){
        $(document).ready(function(){
            
            cadena = "dato1=" + dato1 + "&comentario1=" + comentario1 + <?php $sql = $con->query("SELECT * FROM tareas WHERE Id_Tareas > 1");
                            while ($row = $sql->fetch_array()){?>"&dato<?=$row["Id_Tareas"]?>=" + dato<?=$row["Id_Tareas"]?> + "&comentario<?= $row['Id_Tareas'] ?>=" + comentario<?= $row['Id_Tareas'] ?> + <?php } ?> "&tipoEmpresa=" + tipoEmpresa;
            $.ajax({
                type: "POST",
                url:"php/datosEvaluación.php",
                data:cadena,
                success: alertify.success("Primera evaluación introducida"),
            });
        })
    }


        


       


//

////////////////////////////////
//////// MADUREZ FASE 6 ////////
////////////////////////////////

<?php 
        $select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
        $sql_select = mysqli_query($con,$select);

        while ($row2 = $sql_select->fetch_array()){
        
            $sql = $con->query("SELECT * FROM dimensiones");
        
            while ($row = $sql->fetch_array()){
                $sqlMadDim = $con->query("SELECT * FROM procesos INNER JOIN nivel_madurez ON Id_madurez = FK_Id_madurez INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $row[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector]");

            while ($rowMad = $sqlMadDim->fetch_array()){
?>
        
        if(promedioFixed<?= $rowMad['PId'] ?>!=0){
            document.getElementById("Div_<?= $rowMad["PId"] ?>_<?= $rowMad["Id_madurez"] ?>").innerHTML= "<?= $rowMad['PId'] ?>";
            document.getElementById("LDiv_<?= $rowMad["PId"] ?>_<?= $rowMad["Id_madurez"] ?>").innerHTML= "L" + L<?= $rowMad['PId'] ?>;
        } else {
            document.getElementById("Div_<?= $rowMad["PId"] ?>_<?= $rowMad["Id_madurez"] ?>").style.display="none";
            document.getElementById("LDiv_<?= $rowMad["PId"] ?>_<?= $rowMad["Id_madurez"] ?>").style.display="none";
        }

<?php 
                }
            }
        }

?>
    
    var NivelMadurez;

    if(LGD0 >= 3 && LGD1 >= 3 && LPT2 >= 3 && LPT3 >= 3 && LPM3 >= 3 && LCCh1 >= 3 && LCN2 >= 3 && LSD1 >= 3){
        NivelMadurez = 4;
    <?php 

    $sql = $con->query("SELECT * FROM dimensiones");      
    while ($row = $sql->fetch_array()){ 

    ?>             
        document.getElementById("Dim_<?= $row["Id"] ?>_Procesos4").style.backgroundColor = "rgba(211, 77, 77, 0.3)";
        document.getElementById("LDim_<?= $row["Id"] ?>_Procesos4").style.backgroundColor = "rgba(211, 77, 77, 0.3)";
        document.getElementById("IDim_<?= $row["Id"] ?>_Procesos4").style.backgroundColor = "rgba(211, 77, 77, 0.3)";
    <?php 
        $madurez = $con->query("SELECT * FROM nivel_madurez WHERE Id_madurez = 4");
        while($rowMadnom = $madurez->fetch_array()){
    ?>
        document.getElementById("BnivelMadurez").innerHTML= "<?= $rowMadnom["Madurez"] ?>";
        document.getElementById("textoMad").innerHTML = "en este nivel la organización implementa y establece procesos relacionados con la digitalización organizacional, protección de datos, diseño de servicios, captación de talento y desarrollo del personal. Además, dispone de estrategias para la mejora continua de sus procesos.";
    <?php 
        }
    }
    ?>

    } else if(LGS0 >= 3 && LGS1 >= 3 && LGCo3 >= 3 && LGCo4 >= 3 && LPT1 >= 3 && LPC2 >= 3 && LPM2 >= 3 && LCCh0 >= 3 && LCN1 >= 3 && LCL2 >= 3 && LSR0 >= 3 && LSR1 >= 3){
        NivelMadurez = 3;
    <?php 

    $sql = $con->query("SELECT * FROM dimensiones");      
    while ($row = $sql->fetch_array()){ 

    ?>
        document.getElementById("Dim_<?= $row["Id"] ?>_Procesos3").style.backgroundColor = "rgba(243, 162, 52, 0.3)";
        document.getElementById("LDim_<?= $row["Id"] ?>_Procesos3").style.backgroundColor = "rgba(243, 162, 52, 0.3)";
        document.getElementById("IDim_<?= $row["Id"] ?>_Procesos3").style.backgroundColor = "rgba(243, 162, 52, 0.3)";
    <?php 
        $madurez = $con->query("SELECT * FROM nivel_madurez WHERE Id_madurez = 3");
        while($rowMadnom = $madurez->fetch_array()){
    ?>
        document.getElementById("BnivelMadurez").innerHTML= "<?= $rowMadnom["Madurez"] ?>";
        document.getElementById("textoMad").innerHTML = "En este nivel de madurez, la organización, además de los procesos de los niveles inmaduro y básico, dispone de procesos implementados y establecidos que se enfocan en la gestión del liderazgo organizacional, planes de negocio, competitividad, compliance penal, cambios en los servicios, necesidades y deseos de clientes, fidelización de clientes, planes de formación del personal y gestión de equipos.";
    <?php 
        }
    }
    ?>    

    } else if (LGP1 >= 2 && LGC1 >= 2 && LGCo1 >= 2 && LGCo2 >= 2 && LCL1 >= 2 && LSM2 >= 2 && LSP1 >= 2){
        NivelMadurez = 2;
     <?php 

    $sql = $con->query("SELECT * FROM dimensiones");      
    while ($row = $sql->fetch_array()){ 

    ?>
        document.getElementById("Dim_<?= $row["Id"] ?>_Procesos2").style.backgroundColor = "rgba(244, 208, 63, 0.3)";
        document.getElementById("LDim_<?= $row["Id"] ?>_Procesos2").style.backgroundColor = "rgba(244, 208, 63, 0.3)";
        document.getElementById("IDim_<?= $row["Id"] ?>_Procesos2").style.backgroundColor = "rgba(244, 208, 63, 0.3)";
    <?php 
        $madurez = $con->query("SELECT * FROM nivel_madurez WHERE Id_madurez = 2");
        while($rowMadnom = $madurez->fetch_array()){
    ?>
        document.getElementById("BnivelMadurez").innerHTML= "<?= $rowMadnom["Madurez"] ?>";
        document.getElementById("textoMad").innerHTML = "Este nivel indica que la empresa implementa procesos que se encargan de la gestión de marketing, cultura de servicios, conducta del personal, riesgos potenciales, medición de prestaciones y captación de clientes.";
    <?php 
        }
    }
    ?>   

    } else if (LGP0 >= 1 && LGC0 >= 1 && LPM1 >= 1 && LPC1 >= 1 && LCL0>= 1 && LSM1 >= 1){
        NivelMadurez = 1;
    <?php 

    $sql = $con->query("SELECT * FROM dimensiones");      
    while ($row = $sql->fetch_array()){ 

    ?>
        document.getElementById("Dim_<?= $row["Id"] ?>_Procesos1").style.backgroundColor = "rgba(89, 222, 127, 0.3)";
        document.getElementById("LDim_<?= $row["Id"] ?>_Procesos1").style.backgroundColor = "rgba(89, 222, 127, 0.3)";
        document.getElementById("IDim_<?= $row["Id"] ?>_Procesos1").style.backgroundColor = "rgba(89, 222, 127, 0.3)";
    <?php 
        $madurez = $con->query("SELECT * FROM nivel_madurez WHERE Id_madurez = 1");
        while($rowMadnom = $madurez->fetch_array()){
    ?>
        document.getElementById("BnivelMadurez").innerHTML= "<?= $rowMadnom["Madurez"] ?>";
        document.getElementById("textoMad").innerHTML = "En este nivel, la organización implementa procesos esenciales para la gestión de servicios en todas sus dimensiones.";
    <?php 
        }
    }
    ?>

    }


//Ver si el valor L en el MM es el mínimo para ponerle el tick o no para ponerle la cruz
<?php 

$select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
$sql_select = mysqli_query($con,$select);

while ($row2 = $sql_select->fetch_array()){
                        
    $sql = $con->query("SELECT * FROM dimensiones");
                        
    while ($row = $sql->fetch_array()){
        
        $sqlMadDim = $con->query("SELECT * FROM procesos INNER JOIN nivel_madurez ON Id_madurez = FK_Id_madurez INNER JOIN sectores_pivote ON FK_PId = PId INNER JOIN factores ON Id_Factores = FId INNER JOIN dimensiones ON Id_Dimensiones = Id WHERE Id = $row[Id] AND Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector]");
        
        while ($rowMadDim1 = $sqlMadDim->fetch_array()){
?>
            var SINO<?= $rowMadDim1['PId'] ?>;

            if(L<?= $rowMadDim1["PId"] ?> < <?= $rowMadDim1["Resultado_minimo"] ?>) {

                document.getElementById("IDiv_<?= $rowMadDim1['PId'] ?>_<?= $rowMadDim1['Id_madurez'] ?>").innerHTML = "<i class='bi bi-x-lg' style='color:white;'></i>";
                document.getElementById("IDiv_<?= $rowMadDim1['PId'] ?>_<?= $rowMadDim1['Id_madurez'] ?>").style.backgroundColor="rgb(221, 64, 87)";
                SINO<?= $rowMadDim1['PId'] ?> = 0;
                

            } else if(L<?= $rowMadDim1["PId"] ?> >= <?= $rowMadDim1["Resultado_minimo"] ?>) {
                document.getElementById("IDiv_<?= $rowMadDim1['PId'] ?>_<?= $rowMadDim1['Id_madurez'] ?>").innerHTML = "<i class='bi bi-check-lg' style='color:white;'></i>";
                document.getElementById("IDiv_<?= $rowMadDim1['PId'] ?>_<?= $rowMadDim1['Id_madurez'] ?>").style.backgroundColor="rgb(57, 191, 89)";
                SINO<?= $rowMadDim1['PId'] ?> = 1;
            }


            
<?php 
            
        }
    }
}
?>


//Mostrar los procesos no cumplidos del siguiente nivel de madurez para poder alcanzarlo
<?php 

$select = "SELECT * from formularioinicial WHERE Id_empresa = $tipoEmpresa[0]";
$sql_select = mysqli_query($con,$select);

while ($row2 = $sql_select->fetch_array()){
        
        $sqlMadDim = $con->query("SELECT * FROM procesos INNER JOIN nivel_madurez ON Id_madurez = FK_Id_madurez INNER JOIN sectores_pivote ON FK_PId = PId WHERE Id_tipoempresa <= $row2[Id_tipo_empresa] AND FK_Id_sector = $row2[id_sector]");
        
        while ($rowMadDim = $sqlMadDim->fetch_array()){
            
?>


if(<?= $rowMadDim['Id_madurez'] ?> == NivelMadurez){
    <?php
        $hola = $rowMadDim['Id_madurez'] + 1;
        $sql = $con->query("SELECT * FROM procesos WHERE FK_Id_madurez = $hola");      
        while ($row = $sql->fetch_array()){
    ?>
        if(SINO<?= $row["PId"] ?> == 0){
            document.getElementById("HOLI<?= $row["PId"] ?>").style.display="";
        }
        
    <?php 
        }
    ?>

}

<?php 
        }
}
 ?>

const tablaMad = document.getElementById("madurez_tablaROW").innerHTML;
document.getElementById("tablaMadruez2").innerHTML = tablaMad;

}

//Tabla fase 6: Modelo de madurez
const ctx = document.getElementById('myChartMadurez').getContext('2d');

    const myChartMadurez = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: ['Gobierno Org.','Personas','Clientes', 'Servicios'],
            datasets: [{
                label: 'Nivel de madurez (%)',
                data: [],
                backgroundColor: [
                    'rgba(246, 189, 96, 0.2)',
                    'rgba(196, 69, 54, 0.2)',
                    'rgba(147, 129, 255, 0.2)',
                    'rgba(73, 160, 120, 0.2)',
                ],
                borderColor: [
                    'rgba(246, 189, 96, 1)',
                    'rgba(196, 69, 54, 0.8)',
                    'rgba(147, 129, 255, 1)',
                    'rgba(73, 160, 120, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scale: {
                ticks: {
                    min: 0,
                    max: 100
                }
            }
        }
    });

////////////////////////////////
////////////////////////////////
////////////////////////////////


function informefinal(){
    document.getElementById("Informe2").style.display="";
    document.getElementById("filtroComp").style.display="none";
    document.getElementById("graficos").style.display="none";
    document.getElementById("nombreEmp").style.display="none";
    document.getElementById("navbarEv").style.display="none";
    document.getElementById("volver").style.display="";
    $('#graficos').hide();
    $('#completitud_tareas').hide();
    $('#completitud_procesos').hide();
    $('#madurez_dimensiones').hide();
    $('#completitud_factores').hide();
    $('#completitud_tareas_leyenda').hide();
    $('#madurez_tabla').hide();
    $('#completitud_procesos_leyenda').hide();


}

function volverDeInforme(){
    document.getElementById("Informe2").style.display="none";
    document.getElementById("filtroComp").style.display="";
    document.getElementById("graficos").style.display="";
    document.getElementById("nombreEmp").style.display="";
    document.getElementById("volver").style.display="none";
    document.getElementById("navbarEv").style.display="";

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
}

function printDiv(){
    document.getElementById("volver").style.display="none";
    document.getElementById("printDiv").style.display="none";navbarEv
    $("body").css('backgroundColor','white');
    $("body").css('backgroundImage','linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.9)), url(imagenes/wallpaper2.png)');
    window.print();
    $("body").css('backgroundColor','rgb(154, 140, 152)');
    $("body").css('backgroundImage','url(imagenes/2.jpg)');
    $("body").css('backgroundAttachment','fixed');
    $("body").css('backgroundRepeat','no-repeat');
    $("body").css('backgroundSize','cover');
    document.getElementById("volver").style.display="";
    document.getElementById("printDiv").style.display="";
}

function volverEv(){
    document.getElementById("filtroComp").style.display="none";
    document.getElementById("graficos").style.display="none";
    document.getElementById("contenedorEv").style.display="";
    document.getElementById("informeFinalbtn").style.display="none";
    document.getElementById("volverHome").style.display="";
    document.getElementById("navbarEv").style.display="";
}
</script>