<?php
    include("conexion.php");

$nombre=$_POST['nom'];
$numero=$_POST['num'];
$dia=$_POST['email'];
$cvv=$_POST['pass'];

//encript
    $key="eva";
    $iv =  openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptednum = openssl_encrypt($numero,"aes-256-cbc",$key,0,$iv);
    $encryptedcvv = openssl_encrypt($cvv,"aes-256-cbc",$key,0,$iv);

    $ennum = base64_encode($encryptednum."::".$iv);
 
    $ensueldo = base64_encode($encryptedcvv."::".$iv);

    if(empty($_POST['nom'])||empty($_POST['num'])){
        echo '{"response":"0"}';
    }
    else{
       
        $query = "INSERT INTO rsa(nombre,telefono,correo,contrasena) 
        VALUES ('$nombre', '$ennum','$dia','$ensueldo');";
        
        $resultado = mysqli_query($con,$query);
        echo '{"response":"1"}';
    }
?>