<?php
    include("php/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dis.css">
    <script src="js/aes.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cifrado AES</title>

</head>
<body>
<?php
        include ('header.php');
    ?>

<br><br>
<div class="container">
        <h1>Cifrado AES</h1>
</div>
<div class="container">
    <div class="col-md-offset-8 col-sm-offset-8 col-sm-4 col-md-4">
        
        <div class="container">
            <form action="" id="formulario" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <span>Nombre</span>
                                <input type="text" class="form-control" name="nom"  />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-12">
                                <span>Telefono</span>
                                <input type="number" class="form-control" id="num" name="num"  />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-12">
                                <span>Correo</span>
                                <input type="email" class="form-control" id="email" name="email"  />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-12">
                                <span>Contraseña</span>
                                <input type="text" class="form-control" id="pass" name="pass" />
                            </div>
                        </div>
                        <br>
                       
                    </div>
                </div>
                <br>
                <div class="row ">
                    <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                        <input type="submit" onclick="registrar()" class="btn btn-success btn-block" value="Registrar" /> <br>
                    </div>
                    <br>
                    </div>
                 <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<br><br>
<div class="container">

    <div class="col-md-offset-4 col-sm-offset-4 col-sm-4 col-md-4" style="position:absolute; top:180px; left:600px;">
           <h2>Datos</h2>  
                <table class="table table-bg-success table_planes">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $query="SELECT * FROM aes";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run)>0) {
                            foreach($query_run as $tarjeta){
                                ?>
                                <tr>
                                    <td><?= $tarjeta['nombre'] ?></td>
                                    <td><?= $tarjeta['telefono'] ?></td>
                                    <td><?= $tarjeta['correo'] ?></td>
                                    <td><?= $tarjeta['contrasena'] ?></td>
                                    <td>
                                        
                                    <a class="btn btn-success"  href="DesAES.php?id=<?= $tarjeta['id']; ?>"><i >Ver</i> 
                                    <a class="btn btn-danger" onclick="eliminarid(<?= $tarjeta['id']; ?> )"><i >Eliminar</i></a></a>
                                                                          
                                       
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>
