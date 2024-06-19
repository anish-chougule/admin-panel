<?php
header("Content-Type: application/json");

include("functions.php");
include('connection.php');

// Checks all the paths 
if(isset($_SERVER['PATH_INFO'])){
    $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        // GetAll Request
        case 'GET':
            if ($request[0] === 'getall') {
                @handleGetAll();
            } else {
                echo json_encode(["message" => "Endpoint not found"]);
            }
            break;

        // Add data Request
        case 'POST':
            if ($request[0] === 'add') {
                @handleAdd();
            } else {
                echo json_encode(["message" => "Endpoint not found"]);
            }
            break;

        // Update data Request
        case 'PUT':
            if ($request[0] === 'update') {
                @handleUpdate();
            } else {
                echo json_encode(["message" => "Endpoint not found"]);
            }
            break;

        // Delete Request
        case 'DELETE':
            if ($request[0] === 'delete') {
                @handleDelete($_GET);
            } else {
                echo json_encode(["message" => "Endpoint not found"]);
            }
            break;

        default:
            echo json_encode(["message" => "Method not supported"]);
    }
}

?>