<!DOCTYPE html>
<html lang="en">
<head>
</head>

<footer class="pieGeneral">
        <div class="pieContenedor">
            <ul>
                <li><i class="fab fa-github"></i></li>
                <li><p><a href="https://github.com/sotelomati">Sotelomati</a></p></li>
                <li><p><a href="https://github.com/GonzalezAg">GonzalezAg</a></p></li>
                <li><p><a href="https://github.com/schmidtoctavio">SchmidtOctavio</a></p></li>
            </ul>

            <ul>
                <li><i class="fab fa-linkedin"></i></li>
                <li><p><a href="https://www.linkedin.com/in/matias-sotelo-6a3b901ab/">Sotelo Matias</a></p></li>
                <li><p><a href="#">Gonzalez Agustin</a></p></li>
                <li><p><a href="#">Schmidt Octavio</a></p></li>
            </ul>
                
            <ul>
                <li><img  src="estilos/images/uader.png" alt="imagen de uader"></li>
                <li><p>
                        <a class="facultad" href="http://fcyt.uader.edu.ar/web/">FCyT UADER     <i class="fas fa-chevron-right"></i>
                        <i class="fas fa-chevron-right"></i>
                        </a>
                    </p>
                </li>
            </ul>                           
        </div>
        <hr style="border: 1px solid #dfe4ea">
        <div class="pieFinal">
            <i class="far fa-registered">Copyright Todos los derechos reservados</i>
        </div>
    </footer>
  
    
    <script>

function captchaIngreso() {
    $.ajax({
         type: "POST",
         url: '/probando.php',
         //data:{value},
         success:function() {
           alert(html);
         }

    });
}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="javascript/transicion.js"></script>
</html>




