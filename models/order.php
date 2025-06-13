<?php
// models/Order.php
class Order {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function createOrder($full_name, $email, $shipping_address, $payment_info, $total_amount) {
        // Insert the order into the `orders` table
        $stmt = $this->mysqli->prepare("INSERT INTO orders (full_name, email, shipping_address, payment_info, total_amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $full_name, $email, $shipping_address, $payment_info, $total_amount);
        $stmt->execute();

        // Get the inserted order_id
        $order_id = $this->mysqli->insert_id;
        return $order_id;
    }

    public function createOrderItems($order_id,$productId, $quantity,$price, $total_price) {
        // Insert items into `order_items` table
        $stmt = $this->mysqli->prepare("INSERT INTO order_items (order_id, product_id, quantity, unit_price, total_price) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iiidd", $order_id, $productId, $quantity,$price, $total_price);
            $stmt->execute();
    }

    public function getUserOrders($user_id){
        
    }
}
?>
