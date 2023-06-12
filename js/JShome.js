$(document).ready(function(){
        $("#toEditarButton").click(function(){
            if($("#passwordInput").val()=="123"){
                window.location.href = "Editar_Registros.php";
            } else {
                alertify.error("Contraseña errónea");
            }
        });
    })


