<?php
if(isset($_POST['deleteJuego'])){
    debug_to_console('mama ya llegu')
    $usuarios->deleteJuego($_POST['juegoToDelete']);
}


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>