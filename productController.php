<?php
// controllers/ProductController.php
require_once 'models/product.php';

class ProductController {
    public $productModel;

    public function __construct($conn) {
        $this->productModel = new Product($conn);
    }

    // Display all products
    public function showProducts() {
        $products = $this->productModel->getAllProducts();
        require_once 'views/product/productList.php';  // Pass products to the view
    }
}
?>
