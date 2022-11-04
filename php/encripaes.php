<?php

    define('METHOD','AES-256-CBC');
    define('SECRET_KEY','seguridad');
    define('SECRET_IV','101712');

include("conexion.php");


$nombre=$_POST['nom'];
$numero=$_POST['num'];
$email=$_POST['email'];
$cvv=$_POST['pass'];


$ecripnum=FALSE;
$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$ecripnum=openssl_encrypt($numero, METHOD, $key, 0, $iv);
$ecripnum=base64_encode($ecripnum);



$ecripcvv=FALSE;
$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$ecripcvv=openssl_encrypt($cvv, METHOD, $key, 0, $iv);
$ecripcvv=base64_encode($ecripcvv);


if(empty($_POST['nom'])||empty($_POST['num'])){
    echo '{"response":"0"}';
}
else{
    
    $query = "INSERT INTO aes (nombre,telefono,correo,contrasena) 
    VALUES ('$nombre', '$ecripnum','$email','$ecripcvv');";
    
    $resultado = mysqli_query($con,$query);
    echo '{"response":"1"}';
}
    


?>