<?php

//editar fila
if(isset($_GET['editar'])){  //tomar accion cuando pulse en editar
    $editarid = $_GET['editar']; // almacenar la fila  con el respectivo id a editar

    $consulta = "SELECT * FROM registro WHERE id='$editarid'";
    $ejecutar = mysqli_query($conexion, $consulta);

    $fila = mysqli_fetch_array($ejecutar);

    $usu = $fila["nombre"];
    $pas = $fila["contrasena"];
    $mai = $fila["email"];


    
}

?>

<br />
<form method="POST" action="" >
    <input type="text" name="nomed" value="<?php echo $usu ?>">
    <input type="password" name="pas" value="<?php echo $pas ?>">
    <input type="text" name="ema" value="<?php echo $mai ?>">
    <input type="submit" name="act" value="Actualizar">
</form>

<?php

if(isset($_POST['act'])){
    $nomact = $_POST['nomed'];
    $passact = $_POST['pas'];
    $emailact = $_POST['ema'];


    $update= "UPDATE registro SET nombre='$nomact', contrasena='$passact', email='$emailact' WHERE id='$editarid'";

    $ejecutar = mysqli_query($conexion, $update);

    if($ejecutar){
 
        echo "<script>window.open('index.php')</script>";
    }


}


?>