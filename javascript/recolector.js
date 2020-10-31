contador = 0;
var largo;

var prueba1 = "";

function recibir(x) {
    if(contador < largo){
        //document.getElementById(x).innerHTML.class = "captchaOff";
        document.getElementById(x).onclick = doNothing();
        document.getElementById(x).classList = "captchaOff";
      
        concatenar = document.getElementById(x).innerHTML;
        prueba1 = prueba1 + concatenar;
        document.getElementById("cagadota2").value = prueba1;
        document.getElementById("letra"+contador).innerText = concatenar;

        contador++;
    }
    if(contador == largo){
        //llamarValidator();
    }
    
}

function doNothing(){
    console.log("ya no hago nada");
}

function validame(){
    let palabra = prueba1;
    console.log("quien ha invocado al dios");
    $.ajax({
        url: 'include/pruebas.php',
        type: 'GET',
        data: {'palabra': palabra},
        success: function(response){
        }
    })
};

function refrescar(){
    $(document).ready(function(){
        $('#recargar').load('include/imagenGenerator.php');
    })
}

function mostrarCategoria(){
    
    console.log("quien ha invocado al dios ");
    /*$.ajax({
        url: 'include/pruebas.php',
        type: 'GET',
        data: {'palabra': palabra},
        success: function(response){
        }
    });*/
}


