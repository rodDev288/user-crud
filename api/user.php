
<?php
header('Content-Type: application/json');
require_once '../app/models/User.php';

// Método da requisição (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Lê o ID da URL (caso exista)
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'GET':
        if ($id) {
            echo json_encode(User::find($id));
        } else {
            echo json_encode(User::all());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $ok = User::create($data);
        echo json_encode(['success' => $ok]);
        break;

    case 'PUT':
        parse_str($_SERVER['QUERY_STRING'], $params);
        $data = json_decode(file_get_contents("php://input"), true);
        $ok = User::update($params['id'], $data);
        echo json_encode(['success' => $ok]);
        break;

    case 'DELETE':
        parse_str($_SERVER['QUERY_STRING'], $params);
        $ok = User::delete($params['id']);
        echo json_encode(['success' => $ok]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método não permitido']);
        break;
}
