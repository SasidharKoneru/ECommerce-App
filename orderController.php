<?php
require_once 'models/Order.php';

class OrderController
{
    public function viewOrders() {
        include 'views/orders/orderhistory.php';
    }

    public function getUserOrders($username) {
        
    }
}
?>
