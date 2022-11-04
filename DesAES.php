<?php
    include("php/conexion.php");
    define('METHOD','AES-256-CBC');
    define('SECRET_KEY','seguridad');
    define('SECRET_IV','101712');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/aes.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>AES</title>
</head>
<body>
<br><br>
<div class="container">
    <div >
        <h2>Datos Usuario</h2>
    <div >
            
        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['id'])) {
                $idtar = mysqli_real_escape_string($con,$_GET['id']);
                $query = "select * from aes WHERE id='$idtar'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $tarjeta = mysqli_fetch_array($query_run);

                    $key=hash('sha256', SECRET_KEY);
                    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
                    $output=openssl_decrypt(base64_decode($tarjeta['telefono']),METHOD, $key, 0, $iv);

                    $key=hash('sha256', SECRET_KEY);
                    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
                    $desCVV=openssl_decrypt(base64_decode($tarjeta['contrasena']),METHOD, $key, 0, $iv);
                    ?>
                    <form action="" class="formulario">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre de usuario</label>
                            <p type="text" class="form-control" id="nom" name="nom" value=""><?=$tarjeta['nombre'];?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                            <p type="text" class="form-control" id="num" name="num" value=""><?=$output;?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Correo</label>
                            <p type="text" class="form-control" id="mes" name="mes" value=""><?= $tarjeta['correo']?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                            <p type="text" class="form-control" id="contrasena" name="contrasena" ><?= $desCVV; ?></p>
                        </div>
                        
                    </form>
                    <?php
                }
            }
            ?>
            
        </div>
        <a href="tblAES.php" class="btn btn-success float-end">Regresar</a>
    </div>
</div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>