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
        console.log(prueba1);

        document.getElementById("letra"+contador).innerText = concatenar;

        contador++;
    }
    if(contador == largo){
        llamarValidator(prueba1)
    }
    
}

function doNothing(){
    console.log("ya no hago nada");
}

function llamarValidator(palabrita){
    let palabra = palabrita;
    $.ajax({
        url: 'include/captcha.php',
        type: 'POST',
        data: {palabra},
        success: function(response){
            console.log('me escuchan');
        }
    })
};

function refrescar(){
    contador = 0;
    console.log(contador);
    let refrescame = 1;
    $.ajax ({
        url: 'include/captcha.php',
        type: 'POST',
        data: {refrescame},
        success: function(response){
            $(document).ready(function(){
                $('#contenedorMatriz').load('include/captcha.php');
            })
        }

    })
}

function algo(){
    console.log("alta caca amigo");
    
    console.log(document.getElementById("user").value);
    console.log(document.getElementById("password").value);
}
function caca(){
    useri = document.getElementById("useri").value;
    password = document.getElementById("password").value;
    console.log("alta caca amigo");
    $.ajax ({
        url: 'php/validar.php',
        type: 'GET',
        data: {useri},
        success: function(response){
            $(document).ready(function(){
                console.log("me escucha");
                $('caca1').load('/login.php');
            })
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        }    

    })
}
