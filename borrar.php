<?php

if(isset($_GET['borrar'])){  //tomar accion cuando pulse en editar
    $borrarid = $_GET['borrar'];


$consultabo="DELETE FROM registro WHERE id='$borrarid'";


$ejecutar = mysqli_query($conexion, $consultabo);



if($ejecutar){
 
    echo "<script>window.open('index.php', '_self')</script>";
}

}
?>