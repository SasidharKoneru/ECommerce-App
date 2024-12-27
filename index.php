<?php
session_start();  // Start session to store cart data

require_once 'db.php';
require_once 'controllers/productController.php';
require_once 'controllers/cartController.php';
require_once 'controllers/checkoutController.php';
require_once 'models/cart.php';
require_once 'models/order.php';
require_once 'controllers/orderController.php';

// Initialize controllers
$productController = new ProductController($conn);
$cartController = new CartController($conn);


$orderModel = new Order($conn);
$cart = new Cart();
$checkoutController = new CheckoutController($cart,$orderModel);
$orderController = new OrderController();

$action = isset($_GET['action']);
if ($action != 'home') {
    echo "hello";
    header("Location: index.php?action=home");
    exit;
}

// Handle actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addToCart':
            if(isset($_SESSION['username'])){
            $productId = $_GET['id'];
            $cartController->addToCart($productId, 1); // Add 1 quantity of the product to the cart
            } else {
            header("Location: index.php?action=loginError");
            exit;
            }
            break;
        case 'removeFromCart':
            $productId = $_GET['id'];
            $cartController->removeFromCart($productId);  // Remove the item from the cart
            break;
        case 'viewCart':
            // Show the cart contents
            $cartController->viewCart();
            break;
        case 'checkout':
            if(isset($_SESSION['cart'])){
            include('views/checkout.php');
            } else {
               include 'templates/emptyCart.html';
            }
        break;
        case 'home':
        break;
        case 'processCheckout':
            $checkoutController->checkout();
            break;
        case 'orderSuccess' :
            include('order-confirmation.php');
            break;

        case 'clearCart':
            // Clear the cart
            $cartController->clearCart();
            // Redirect to home or cart page after clearing
            header("Location: index.php?action=home");
            exit;
            break;
        case 'login':
            include 'templates/login.html';
            break;
        case 'register':
            include 'templates/register.html';
            break;
        case 'profile':
            include 'templates/profile.php';
            break;
        case 'signout':
            unset($_SESSION['username']);
            header("Location: index.php?action=home");
            unset($_SESSION['cart']);
        break;
        case 'loginError':
            include 'templates/loginError.html';
        break;
        case 'payment':
            include 'templates/payment.html';
        break;
    }
}
// Display the product list
$productController->showProducts();

// Display the cart
$cartController->viewCart();

$orderController->viewOrders();
?>


