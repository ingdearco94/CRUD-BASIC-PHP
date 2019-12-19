<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php $conexion = mysqli_connect('localhost', 'root', '', 'crud') or die ('Error');?>
    <title>Registro</title>
</head>


<body class="fondo">


<nav class="navbar navbar-primary bg-warning" >
              <div class="container">
                <a class="navbar-brand" href="index.html">
                  <img src="img/logo.png" width="40px" height="auto" alt="">
              
                </a>
              </div>
              </nav>
<center>

<!--formulario frontend-->
<div class="container2"> 
<form class="formu" action="index.php" method="POST">
<label>Nombre:</label>
<input type="text" REQUIRED name="nombre" placeholder="Ingresa Nombre">
<label>Contraseña:</label>
<input type="password" REQUIRED name="contrasena" placeholder="Ingresa tu Contraseña">
<label>E-mail:</label>
<input type="text" REQUIRED name="mail" placeholder="Ingresa tu e-mail">
<input class="send" type="submit" name="send" value="Registrar usuario">
</form>
</div>  
<?php


//guardar datos insertados en una variable

if(isset($_POST['send'])){
    $usurname = $_POST['nombre'];
    $pasword = $_POST['contrasena'];
    $email =$_POST['mail'];
   


//insertar datos en la BD

$insertar = "INSERT INTO registro (nombre, contrasena, email) VALUES ('$usurname', '$pasword', '$email')";

$ejecutar = mysqli_query($conexion, $insertar);

if($ejecutar){
    echo "<h3>insetado<h3>";
}
}


?>

<!-- tabla de la base de datos frontend-->
<br />

<h2>Control de Registro</h2>
<table class="container"  width="500px" border="2" style="background-color: #F9F9F9">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Contraseña</th>
        <th>E-mail</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>


<?php

//traer la BD
$consulta = 'SELECT * FROM registro';

$ejecutar = mysqli_query($conexion, $consulta);

// almacenar datos de la BD en una variable
$i=0; 

while($fila = mysqli_fetch_array($ejecutar)){ //convierte los datos en un array
    $id = $fila['id'];
    $nom = $fila['nombre'];
    $pass = $fila['contrasena'];
    $emai = $fila['email'];


    $i++; // para que me traiga la fila 1, luego 2, y asi...


?>

<tr align="center">
    <td><?php echo $id;?></td>
    <td><?php echo $nom;?></td>
    <td><?php echo $pass;?></td>
    <td><?php echo $emai;?></td>
    <td><a href="index.php?editar=<?php echo $id; ?>">Editar</a></td>
    <td><a href="index.php?borrar=<?php echo $id; ?>">Borrar</a></td>
</tr>

<?php } ?>

</table>


<?php

if(isset($_GET['editar'])){
    include ("actualizar.php");
}


?>


<?php

if(isset($_GET['borrar'])){
    include ("borrar.php");
}


?>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   




</body>
</html>



