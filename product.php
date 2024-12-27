<?php
// models/product.php

class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fetch all products from the database
    public function getAllProducts() {
        $query = "SELECT * FROM products1";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);  // Return as associative array
        } else {
            return []; 
        }
    }

    // Fetch a single product by ID
    public function getProductById($id) {
        $query = "SELECT * FROM products1 WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();  // Return a single associative array
    }
}
?>
