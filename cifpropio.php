<?php
include("conexion.php");
$sql="insert into table_loginc 
values
(null,'".$_POST["email"]."','".$_POST["nombres"]."','".$_POST["password"]."','".$_POST["celphone"]."',now())
";
//echo $sql;



$res=mysql_query($sql,$conexion);
echo "<script type=''>
    alert('Te has registrado correctamente');
    window.location='index.php';
</script>";
?>