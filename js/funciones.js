// Agregar datos en las tablas
function agregardatos(nombre,colorD){

    cadena = "nombre=" + nombre + "&colorD=" + colorD;

    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatos.php",
        data:cadena,
        success:function(r){
            if(r==1){
               $('#tabla').load('tablas/tabla.php');
               $('#tabla2').load('tablas/tabla2.php');
               $('#tabla3').load('tablas/tabla3.php');
               $('#tabla4').load('tablas/tabla4.php');
               alertify.success("Agregado con éxito");
            } else {
               alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function Fagregardatos(Fnombre,Fdimension){

    cadena = "Fnombre=" + Fnombre + "&Fdimension=" + Fdimension;

    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatosFactores.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla2').load('tablas/tabla2.php');
                $('#tabla3').load('tablas/tabla3.php');
                $('#tabla4').load('tablas/tabla4.php');
                alertify.success("Agregado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function Pagregardatos(PId,Pnombre,Pfactor,Ptipo){

    cadena = "PId=" + PId + "&Pnombre=" + Pnombre + "&Pfactor=" + Pfactor + "&Ptipo=" + Ptipo;

    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatosProcesos.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla3').load('tablas/tabla3.php');
                $('#tabla4').load('tablas/tabla4.php');
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Agregado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function Tagregardatos(TId,Tnombre,Tproceso){

    cadena = "TId=" + TId + "&Tnombre=" + Tnombre + "&Tproceso=" + Tproceso;

    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatosTareas.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla4').load('tablas/tabla4.php');
                alertify.success("Agregado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function Sagregardatos(Snombre){

    cadena = "Snombre=" + Snombre;

    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatosServicios.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla5').load('tablas/tabla5.php');
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Agregado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function SPagregardatos(SPnombre,SPproceso){

    cadena = "SPnombre=" + SPnombre + "&SPproceso=" + SPproceso;

    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatosServiciosPivote.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Agregado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function MADagregardatos(nombreM,valorM,colorM){

    cadena = "nombreM=" + nombreM + "&valorM=" + valorM + "&colorM=" + colorM;
    console.log(colorM);
    $.ajax({
        type: "POST",
        url:"php/modTablas/agregarDatosMAD.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla7').load('tablas/tabla7.php');
               alertify.success("Agregado con éxito");
            } else {
               alertify.error("Ha ocurrido un error");
            }
        }
    });
}


//Añadir los datos de la fila al form para actualizarlos
function agregaform(datos){
    
    d = datos.split('||');
    
    $('#idnombre').val(d[0]);
    $('#nombreE').val(d[1]);
    $('#colorDE').val(d[2]);

}

function Fagregaform(datos){
    
    d = datos.split('||');

    $('#Fidnombre').val(d[0]);
    $('#FnombreE').val(d[1]);
    $('#FdimensionE').val(d[2]);

}

function Pagregaform(datos){
    
    d = datos.split('||');

    $('#Pidnombre').val(d[0]);
    $('#PnombreE').val(d[1]);
    $('#PfactorE').val(d[2]);
    $('#PdimE').val(d[3]);
    $('#PtipoE').val(d[4]);    

}

function Tagregaform(datos){
    
    d = datos.split('||');

    $('#Tidnombre').val(d[0]);
    $('#TnombreE').val(d[1]);
    $('#TprocesoE').val(d[2]);

}

function Sagregaform(datos){
    
    d = datos.split('||');

    $('#Sidnombre').val(d[0]);
    $('#SnombreE').val(d[1]);
}

function SPagregaform(datos){
    
    d = datos.split('||');

    $('#SPidnombre').val(d[0]);
    $('#SPnombreE').val(d[1]);
    $('#SPprocesoE').val(d[2]);
}

function MADagregaform(datos){
    
    d = datos.split('||');
    console.log(d[3]);
    $('#idmadurezE').val(d[0]);
    $('#madurezE').val(d[1]);
    $('#valorMADE').val(d[2]);
    $('#colorMADE').val(d[3]);

}

//Actualizar los datos de las tablas
function actualizaDatos(){

    id = $('#idnombre').val();
    nombreE = $('#nombreE').val();
    colorD = $('#colorDE').val();
    var red = parseInt(colorD[1]+colorD[2],16);
    var green = parseInt(colorD[3]+colorD[4],16);
    var blue = parseInt(colorD[5]+colorD[6],16);
    colorDE = red + ", " + green + ", " + blue;
    

    cadena = "id=" + id + "&nombreE=" + nombreE + "&colorDE=" + colorDE;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatos.php",
        data: cadena,
        success: function(r){
            if(r==1){
                $('#tabla').load('tablas/tabla.php');
                $('#tabla2').load('tablas/tabla2.php');
                $('#tabla3').load('tablas/tabla3.php');
                $('#tabla4').load('tablas/tabla4.php');
                alertify.success("Actualizado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });

}

function FactualizaDatos(){

    id = $('#Fidnombre').val();
    nombre = $('#FnombreE').val();
    dimension = $('#FdimensionE').val();

    cadena = "id=" + id + "&nombre=" + nombre + "&dimension=" + dimension;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatosFactores.php",
        data: cadena,
        success: function(r){
            if(r==1){
                 $('#tabla2').load('tablas/tabla2.php');
                 $('#tabla3').load('tablas/tabla3.php');
                 $('#tabla4').load('tablas/tabla4.php');
                alertify.success("Actualizado con éxito");               
            } else {
                 alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function PactualizaDatos(){

    id = $('#Pidnombre').val();
    nombre = $('#PnombreE').val();
    factor = $('#PfactorE').val();
    tipo = $('#PtipoE').val();

    cadena = "id=" + id + "&nombre=" + nombre + "&factor=" + factor + "&tipo=" + tipo;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatosProcesos.php",
        data: cadena,
        success: function(r){
            if(r==1){
                $('#tabla3').load('tablas/tabla3.php');
                $('#tabla4').load('tablas/tabla4.php');
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Actualizado con éxito");               
            } else {
                 alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function TactualizaDatos(){

    id = $('#Tidnombre').val();
    nombre = $('#TnombreE').val();
    proceso = $('#TprocesoE').val();

    cadena = "id=" + id + "&nombre=" + nombre + "&proceso=" + proceso;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatosTareas.php",
        data: cadena,
        success: function(r){
            if(r==1){
                $('#tabla4').load('tablas/tabla4.php');
                alertify.success("Actualizado con éxito");               
            } else {
                 alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function SactualizaDatos(){

    id = $('#Sidnombre').val();
    nombre = $('#SnombreE').val();

    cadena = "id=" + id + "&nombre=" + nombre;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatosServicios.php",
        data: cadena,
        success: function(r){
            if(r==1){
                $('#tabla5').load('tablas/tabla5.php');
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Actualizado con éxito");               
            } else {
                 alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function SPactualizaDatos(){

    id = $('#SPidnombre').val();
    nombre = $('#SPnombreE').val();
    proceso = $('#SPprocesoE').val();

    cadena = "id=" + id + "&nombre=" + nombre + "&proceso" + proceso;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatosServiciosPivote.php",
        data: cadena,
        success: function(r){
            if(r==1){
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Actualizado con éxito");               
            } else {
                 alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function MADactualizaDatos(){

    id = $('#idmadurezE').val();
    nombreE = $('#madurezE').val();
    valorE = $('#valorMADE').val();
    colorD = $('#colorMADE').val();
    var red = parseInt(colorD[1]+colorD[2],16);
    var green = parseInt(colorD[3]+colorD[4],16);
    var blue = parseInt(colorD[5]+colorD[6],16);
    colorME = red + ", " + green + ", " + blue;
    

    cadena = "id=" + id + "&nombreE=" + nombreE + "&valorE=" + valorE + "&colorME=" + colorME;

    $.ajax({
        type:"POST",
        url:"php/modTablas/actualizaDatosMAD.php",
        data: cadena,
        success: function(r){
            if(r==1){
                alertify.success("Actualizado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });

}

//Notificación confirmando la eliminación del registro de las tablas
function preguntarSiNo(id){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ eliminarDatos(id) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}

function FpreguntarSiNo(Fid){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ FeliminarDatos(Fid) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}

function PpreguntarSiNo(PId){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ PeliminarDatos(PId) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}

function TpreguntarSiNo(TId){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ TeliminarDatos(TId) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}

function SpreguntarSiNo(SId){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ SeliminarDatos(SId) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}

function SPpreguntarSiNo(SPId){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ SPeliminarDatos(SPId) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}

function MADpreguntarSiNo(MADId){
    alertify.confirm('Eliminar datos', '¿Está segur@ de eliminar este registro?', 
        function(){ MADeliminarDatos(MADId) },
        function(){ alertify.error('Se ha cancelado la operación')}
        );
}


//Al contestar Sí, estas funciones se encargan de conectar con el código de la bbdd para eliminar los registros
function eliminarDatos(id){
    
    cadena = "id=" + id;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatos.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla').load('tablas/tabla.php');
                alertify.success("Eliminado con éxito");
                } else {
               alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function FeliminarDatos(Fid){
    
    cadena = "Fid=" + Fid;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatosFactores.php",
        data:cadena,
        success:function(r){
                if(r==1){
                $('#tabla2').load('tablas/tabla2.php');
                alertify.success("Eliminado con éxito");
            } else {
               alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function PeliminarDatos(PId){
    
    cadena = "PId=" + PId;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatosProcesos.php",
        data:cadena,
        success:function(r){
                if(r==1){
                $('#tabla3').load('tablas/tabla3.php');
                $('#tabla4').load('tablas/tabla4.php');
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Eliminado con éxito");
            } else {
               alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function TeliminarDatos(TId){
    
    cadena = "TId=" + TId;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatosTareas.php",
        data:cadena,
        success:function(r){
                if(r==1){
                $('#tabla4').load('tablas/tabla4.php');
                alertify.success("Eliminado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function SeliminarDatos(SId){
    
    cadena = "SId=" + SId;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatosServicios.php",
        data:cadena,
        success:function(r){
                if(r==1){
                $('#tabla5').load('tablas/tabla5.php');
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Eliminado con éxito");
            } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function SPeliminarDatos(SPId){
    
    cadena = "SPId=" + SPId;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatosServiciosPivote.php",
        data:cadena,
        success:function(r){
                if(r==1){
                $('#tabla6').load('tablas/tabla6.php');
                alertify.success("Eliminado con éxito");
                } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}

function MADeliminarDatos(MADId){
    
    cadena = "MADId=" + MADId;

    $.ajax({
        type:"POST",
        url:"php/modTablas/eliminarDatosMAD.php",
        data:cadena,
        success:function(r){
                if(r==1){
                $('#tabla7').load('tablas/tabla7.php');
                alertify.success("Eliminado con éxito");
                } else {
                alertify.error("Ha ocurrido un error");
            }
        }
    });
}