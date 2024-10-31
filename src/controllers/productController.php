<?php
    require_once '../repositories/productRepo.php';
    require_once '../models/productModel.php';

    class productController {
        private $productRepository;

        public function __construct() {
            $this->productRepository = new productRepo();
        }
        
        public function createProduct($data){
            $product = new product();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->type = $data['type'];
            $product->price = $data['price'];
            $product->image = $data['image'];

            return $this->productRepository->createProduct($product);
        }

        public function updateProduct($data){
            $product = new product();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->type = $data['type'];
            $product->price = $data['price'];
            $product->image = $data['image'];

            return $this->productRepository->updateProduct($product);
        }

        public function deleteProduct($id) {
            return $this->productRepository->deleteProduct($id);
        }

        public function getAllProducts() {
            return $this->productRepository->getAllProducts();
        }

        public function getProductByName($name) {
            return $this->productRepository->getProductByName($name);
        }
    }
?>