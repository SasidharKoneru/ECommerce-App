<?php
// controllers/CheckoutController.php
class CheckoutController {
    private $cartModel;
    public $orderModel;
    
    public function __construct($cartModel,$orderModel) {
        $this->cartModel = $cartModel;
        $this->orderModel = $orderModel; 
    }

    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Collect customer details from the form
            $full_name = $_POST['name'];
            $email = $_POST['email'];
            $shipping_address = $_POST['address'];
            $payment_info = $_POST['payment'];
            $total_amount = $_SESSION['cartAmount'];  // Get the total amount from the session
            $conn = new mysqli("localhost","root","","test");
            // Assuming you have an Order model to handle database interaction
            $orderModel = new Order($conn);

            // Create the order
            $orderId = $orderModel->createOrder($full_name, $email, $shipping_address, $payment_info, $total_amount);
            
            // Add items to the order from the session cart
            $cartItems = $_SESSION['cart'];
            // foreach ($cartItems as $productId => $quantity) {
            //     $orderModel->createOrderItems($orderId, $productId, $quantity);
            //     echo ;
            // }
            $productModel = new Product($conn);
            $total = 0;
            foreach ($cartItems as $productId => $quantity):
                $product = $productModel->getProductById($productId);
                $total += $product['price'] * $quantity;
                $orderModel->createOrderItems($orderId,$productId, $quantity,$product['price'],$total);
            
           endforeach; 
    
            // Clear the cart after checkout
            $_SESSION['cart'] = [];
            $_SESSION['cartAmount'] = 0;
    
            // Redirect to order confirmation page
            header('Location: index.php?action=orderSuccess&orderId='. $orderId);
            exit();
        }
    }

    // public function showCheckoutPage() {
    //     // Get cart items and total amount
    //     $cartItems = $this->cartModel->getCartItems();
    //     $totalAmount = $this->cartModel->getTotalAmount();

    //     // Include the checkout view
    //     include 'views/checkout.php';
    // }
}
?>