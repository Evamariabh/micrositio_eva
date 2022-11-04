<?php
    define('METHOD','AES-256-CBC');
    define('SECRET_KEY','seguridad');
    define('SECRET_IV','101712');

    class encriptaciones
    {
        public static function encryption($string){
            $output=FALSE;
            $key=hash('sha256', SECRET_KEY);
            $iv=substr(hash('sha256', SECRET_IV), 0, 16);
            $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
            $output=base64_encode($output);
            return $output;
        }
    }
    

?>