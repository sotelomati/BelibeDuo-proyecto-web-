contador = 0;
console.log(largo);
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
