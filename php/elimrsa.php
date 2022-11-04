<?php
include("conexion.php");
$id=$_GET['id'];
//Consulta
$sql = "delete from rsa where id = '$id'";
mysqli_set_charset($con, "utf8"); 

if(!$result = mysqli_query($con, $sql)){   
    echo '{"response":"0"}';
    die();
}
else
    echo '{"response":"1"}';
?>