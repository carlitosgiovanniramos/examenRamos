<?php
class Connection {
    public static function connect() {
        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "examen";
        $port = "3306";
        try {
            return $connection = new PDO("mysql:host=$server; port=$port; dbname=$dbname", $user, $password);
            } catch (Exception $error) {
                die("Error al intentar conectar" . $error->getMessage());
            } 
        }
}
?>