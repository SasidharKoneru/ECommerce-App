<!-- views/layouts/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP E-Commerce</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php">PHP E-Commerce</a></h1>
            <nav>
                <ul>
                    <li><a href="index.php?action=home">Home</a></li>
                    <li><a href="index.php?action=viewCart">Cart</a></li>
                    <li><a href="index.php?action=checkout" id="checkout">Checkout</a></li>
                    <?php
                        if (isset($_SESSION['username'])) {
                    ?>
                        <li><a href="index.php?action=profile"> <?php echo $_SESSION['username']?></a>
                    <?php }
                        else {
                    ?>
                    <li><a href="index.php?action=login" id="login">Login</a></li>
                    <?php 
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
