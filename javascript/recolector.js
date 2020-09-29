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
        contador++;
    }
    else{
        llamarValidator(prueba1)
    }
    
}

function doNothing(){
    console.log("ya no hago nada");
}

function llamarValidator(palabra){
    $.ajax(
        {
            url: 'get_var.php?var=<?php echo $var; ?>',
            success: function( data ) {
                alert( 'El servidor devolvio "' + data + '"' );
            }
        }
    )
};
