<!-- views/cart/cart.php -->
<div class="cart-sidebar">
    <h3>Your Cart</h3>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul class="cart-items">
            <?php
            $cartItems = $_SESSION['cart'];
            $total = 0;
            foreach ($cartItems as $productId => $quantity):
                $product = $this->productModel->getProductById($productId);
                $total += $product['price'] * $quantity;
            ?>
            <li class="cart-item">
                <p><strong><?php echo $product['name']; ?></strong> - Quantity: <?php echo $quantity; ?></p>
                <p>Price: $<?php echo $product['price']; ?></p>
                <p>Total: $<?php echo $product['price'] * $quantity; ?></p>
                <a href="index.php?action=removeFromCart&id=<?php echo $productId; ?>" class="remove-from-cart">Remove</a>
            </li>
            <?php endforeach; ?>
            <?php $_SESSION['cartAmount'] = $total; ?>
         </ul>

        <p><strong>Total Price: $<?php echo $total; ?></strong></p>

        <div class="cart-actions">
            <a href="index.php?action=clearCart" class="clear-cart-btn">Clear Cart</a>
            <a href="index.php?action=checkout" class="checkout-button">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>

