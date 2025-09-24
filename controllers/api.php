<?php
include_once ("../models/crud.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

$opc = $_SERVER['REQUEST_METHOD'];

switch ($opc) {
    case 'GET':
        if(isset($_GET['cedula'])) {
            CRUD::searchStudent();
        } else {
            CRUD::selectStudent();
        }
        break;
    case 'POST':
        CRUD::insertStudent();
        break;
    case 'PUT':
        CRUD::updateStudent();
        break;
    case 'DELETE':
        CRUD::deleteStudent();
        break;
    default:
    echo json_encode("Fallo al acceder a una operacion CRUD");
    break;
}
?>