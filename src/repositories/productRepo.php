<?php
    require_once '../config/database.php';
    require_once '../interfaces/iProduct.php';

    class productRepo implements iProduct {
        private $conn;
        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
            if ($this->conn === null) {
            throw new Exception("Failed to connect to the database.");
        }
        }

        public function createProduct($product){
            $sql = "INSERT INTO products (name, description, type, price, image) VALUES (:name, :description, :type, :price, :image)"; // SQL query, se usa :name, :description, etc. para evitar SQL injection, tambien se ouede usar  ? en lugar de :name, :description, etc.
            $res = $this->conn->prepare($sql); // Se prepara la consulta

            $res->bindParam(':name', $product->name);
            $res->bindParam(':description', $product->description);
            $res->bindParam(':type', $product->type);
            $res->bindParam(':price', $product->price);
            $res->bindParam(':image', $product->image);

            if ($res->execute()) {
                return ['msg' => 'Product created'];
            } else {
                return ['msg'=> 'Error creating product'];
            }

        }

         public function updateProduct($product){
            $sql = "UPDATE products SET name = :name, description = :description, type = :type, price = :price, image = :image WHERE idproduct = :idproduct"; // SQL query, se usa :name, :description, etc. para evitar SQL injection, tambien se ouede usar  ? en lugar de :name, :description, etc.
            $res = $this->conn->prepare($sql); // Se prepara la consulta

            $res->bindParam(':idproduct', $product->idproduct);
            $res->bindParam(':name', $product->name);
            $res->bindParam(':description', $product->description);
            $res->bindParam(':type', $product->type);
            $res->bindParam(':price', $product->price);
            $res->bindParam(':image', $product->image);

            if ($res->execute()) {
                return ['msg' => 'Product updated'];
            } else {
                return ['msg'=> 'Error updating product'];
            }

        }

        public function deleteProduct($idproduct) {
            $sql = "DELETE FROM products WHERE idproduct = :idproduct";
            $res = $this->conn->prepare($sql);
            $res->bindParam(":idproduct", $idproduct);

            if ($res->execute()) {
                return ["msg"=> "Product deleted"];
            } else {
                return ["msg"=> "Error deleting product"];
            }

        }

        public function getAllProducts() {
            $sql = "SELECT * FROM products";
            $res = $this->conn->prepare($sql);
            $res->execute();
            return  $res->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductByName($name) {
            $sql = "SELECT * FROM products WHERE name = :name";
            $res = $this->conn->prepare($sql);
            $res->bindParam(':name', $name); // Se asigna el valor a :name porque  se usa en la consulta SQL
            $res->execute();
            return $res->fetch(PDO::FETCH_ASSOC);

        }
    }
?>