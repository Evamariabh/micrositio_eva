<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<form action="reg_login_user.php" method="post">
    <input type="text" name="email" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Ingrese un email valido"/>
    <input type="text" placeholder="Ingrese sus nombres" class="email" name="nombres" title="Ingrese sus nombres" />                                            
    <input type="pass" placeholder="pass" required="required" name="pass" pattern=".{6,}" title="Minimo 6 characteres" autocomplete="off" />
    <input type="text" class="email" placeholder="Numero de celular" maxlength="10" pattern="[1-9]{1}\d{9}" title="Ingrese su numero de celular" name="celphone" required  />
    <input type="submit"  value="REGISTRARSE"/>
</form>