<?php
// controllers/CartController.php
require_once 'models/cart.php';

require_once 'models/product.php';

class CartController { 
    private $cart;
    public $productModel;

    public function __construct($conn) { 
        $this->cart = new Cart();
        $this->productModel = new Product($conn);
    }

    // Add an item to the cart
    public function addToCart($productId, $quantity) {
        $this->cart->addItem($productId, $quantity);
        // Recalculate total after adding item
        $total = $this->cart->getTotal($this->productModel);
        // Optionally, store the cart and total in the session
        $_SESSION['cart'] = $this->cart->getItems();
        $_SESSION['total'] = $total;
    }

    // View the cart (will be shown on the same page as products)
    public function viewCart() {
        // Recalculate total before displaying the cart
        $total = $this->cart->getTotal($this->productModel);
        require_once 'views/cart/cart.php';  // Display the cart below the product list
    }

    // Remove an item from the cart
    public function removeFromCart($productId) {
        $this->cart->removeItem($productId);
        // Recalculate total after removing item
        $total = $this->cart->getTotal($this->productModel);
        $_SESSION['cart'] = $this->cart->getItems();  // Update session with new cart
        $_SESSION['total'] = $total;
    }
    public function checkout() {
        // If the cart is empty, redirect to the home page
        if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
            header("Location: index.php");
            exit;
        }

        // Include the checkout page view
        include('views/checkout.php');
    }
    public function processCheckout() {
        
    }
    public function clearCart() {
        // Unset the cart session to clear all items
        unset($_SESSION['cart']);
    }
}
?>
