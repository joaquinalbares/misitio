<?php
// Indicamos al cliente que la respuesta siempre será en formato JSON
header("Content-Type: application/json; charset=UTF-8");

//Obtenemos el método de envío de datos del cliente
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'GET') {
    // Lectura de parámetros enviados por la URL (Query Params)
    $categoria = $_GET['categoria'] ?? 'todas';

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "metodo" => "GET",
        "mensaje" => "Consulta realizada correctamente",
        "categoria_filtrada" => $categoria
    ]);
} elseif ($metodo === 'POST') {
    // Lectura del cuerpo de la petición enviado en JSON
    $input = json_decode(file_get_contents('php://input'), true);

    // Validación básica de campos obligatorios
    if (!isset($input['usuario']) || !isset($input['email'])) {
        http_response_code(400); // Bad Request
        echo json_encode([
            "status" => "error",
            "mensaje" => "Faltan datos obligatorios: 'usuario' y 'email'"
        ]);
    } else {
        http_response_code(201); // Created
        echo json_encode([
            "status" => "success",
            "metodo" => "POST",
            "mensaje" => "Usuario registrado con éxito",
            "datos_recibidos" => $input
        ]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["status" => "error", "mensaje" => "Método no soportado"]);
}
