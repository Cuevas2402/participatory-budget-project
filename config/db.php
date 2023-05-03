<?php
    class Database {
        /* Datos para la conexion a las base de datos*/
        private $host = "localhost";
        private $database = "presupueto";
        private $user = "root";
        private $password = "";
        private $charset = "utf8";

        function connect(){
            try{
                /* Cadena de conexion con los datos */
                $connection = "mysql:host=" . $this->host . "; dbname=" . $this->database . "; charset=" . $this->charset;
                /* Generar expection en caso de errores, configuariocn para que las consultas no sean emuladas */
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false ];
                $pdo = new PDO ($connection, $this->user, $this->password, $options);
                /* Devolver la conexion*/
                return $pdo;
                
            }catch(PDOException $e){
                echo 'Error'.$e->getMessage();
                exit;
            }
        }
    }

    $db = new Database();
    $pdo = $db -> connect();

?>