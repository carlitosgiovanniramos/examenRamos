<?php
include_once("connection.php");
class CRUD {

    public static function selectStudent() {
        $connection = Connection::connect();
        $sqlSelect = "SELECT * FROM estudiantes";
        $result = $connection->prepare($sqlSelect);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

    public static function insertStudent() {
        $connection = Connection::connect();
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $sqlInsert = "INSERT INTO estudiantes (cedula, nombre, apellido, direccion, telefono) VALUES ('$cedula','$nombre','$apellido','$direccion','$telefono')";
        $result = $connection->prepare($sqlInsert);
        $result->execute();
        $data = "Se inserto correctamente al estudiante";
        echo json_encode($data);
    }

    public static function updateStudent(){
        $connection = Connection::connect();
        if($_SERVER['REQUEST_METHOD'] === 'PUT'){
            parse_str(file_get_contents("php://input"), $data);
        } else {
            $data = $_GET;
        }
        $cedula = $data['cedula'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $direccion = $data['direccion'];
        $telefono = $data['telefono'];
        $sqlUpdate = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' WHERE cedula='$cedula'";
        $result = $connection->prepare($sqlUpdate);
        $result->execute();
        $data = "Estudiante Actualizado Correctamente";
        echo json_encode($data);
    }

    public static function deleteStudent() {
        $connection = Connection::connect();
        $cedula = $_GET['cedula'];
        $sqlDelete = "DELETE FROM estudiantes WHERE cedula='$cedula'";
        $result = $connection->prepare($sqlDelete);
        $result->execute();
        $data = "Estudiante Eliminado correctamente";
        echo json_encode($data);
    }

    public static function searchStudent() {
        $connection = Connection::connect();
        $cedula = isset($_GET['cedula']) ? $_GET['cedula'] : null;
        if (!$cedula) {
            echo json_encode([]);
            return;
        }
        $sqlSearch = "SELECT * FROM estudiantes WHERE cedula = :cedula";
        $result = $connection->prepare($sqlSearch);
        $result->execute([':cedula' => $cedula]);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}
?>
