<?php
    include("conexion.php");

    $nombre=$_POST['nom'];
    $numero=$_POST['num'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

$ennum = sha1($numero);

$enpass = sha1($pass);

if(empty($_POST['nom'])||empty($_POST['num'])){
    echo '{"response":"0"}';
}
else{
   
    $query = "INSERT INTO sha1(nombre,telefono,correo,contrasena)
    VALUES ('$nombre', '$ennum','$email','$enpass');";
    
    $resultado = mysqli_query($con,$query);
    echo '{"response":"1"}';
}
?>