<?php
    require_once '../controllers/productController.php';
    require_once '../middleware/authMiddleware.php';

    $productController = new productController();

    $app->post('/products', function() use ($productController) {
        $data = json_decode(file_get_contents("php://input"), true);
        return json_encode($productController->createProduct($data));
    });

    $app->put('/products', function() use ($productController) {
        $data = json_decode(file_get_contents("php://input"), true);
        return json_encode($productController->updateProduct($data));
    });

    $app->delete('/products/{id}', function($id) use ($productController) {
        return json_encode($productController->deleteProduct($id));
    });

    $app->get('/products', function($id) use ($productController) {
        return json_encode($productController->getAllProducts());
    });

?>