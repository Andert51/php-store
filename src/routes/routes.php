<?php
require_once '../controllers/productController.php';
require_once '../middleware/authMiddleware.php';

$productController = new productController();

// Obtener el método de la solicitud
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Manejar cada método manualmente
if ($requestMethod === 'POST') {
    // Código para crear producto
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($productController->createProduct($data));
} elseif ($requestMethod === 'PUT') {
    // Código para actualizar producto
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($productController->updateProduct($data));
} elseif ($requestMethod === 'DELETE') {
    // Código para eliminar producto
    $id = $_GET['id'] ?? null;
    if ($id) {
        echo json_encode($productController->deleteProduct($id));
    } else {
        echo json_encode(["msg" => "Product ID is required for deletion"]);
    }
} elseif ($requestMethod === 'GET') {
    // Ruta GET para obtener todos los productos
    echo json_encode($productController->getAllProducts());
} else {
    // Respuesta si la ruta no es encontrada
    echo json_encode(["msg" => "Route not found"]);
}
?>
