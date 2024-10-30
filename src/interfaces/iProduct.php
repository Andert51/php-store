<?php 
    interface iProduct {
        public function createProduct($product);
        public function updateProduct($product);
        public function deleteProduct($idproduct);
        public function getAllProducts();
        public function getProductByName($name);
    }
?>