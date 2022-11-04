<?php
    include("conexion.php");

    $nombre=$_POST['nom'];
    $numero=$_POST['num'];
    $correo=$_POST['email'];
    $pass=$_POST['pass'];


$ennumero = md5( $numero );
$enpass = md5( $pass );


if(empty($_POST['nom'])||empty($_POST['num'])){
    echo '{"response":"0"}';
}
else{
    
    $query = "INSERT INTO md5(NombreUsuario,email,telefono,contrasena) 
    VALUES ('$nombre', '$correo','$ennumero','$enpass');";
    
    $resultado = mysqli_query($con,$query);
    echo '{"response":"1"}';
}

?>


