<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* The Checkout Modal (Hidden by Default) */
        .checkout {
            display: none; /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Modal Content */
        .checkout-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            position: relative;
        }


        /* Close Button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: #333;
            cursor: pointer;
        }

        /* Form Fields Styling */
        .checkout-content input[type="text"], 
        .checkout-content input[type="email"], 
        .checkout-content textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Submit Button Styling */
        .checkout-content button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-content button[type="submit"]:hover {
            background-color: #0056b3;
        }

        th, td {
            padding: 3px;
        }
    </style>
</head>
<body>

<!-- Checkout Modal (Popup) -->
<div id="checkoutModal" class="checkout">
    <div class="checkout-content">
        <a href="index.php?action=home"><span id="closeModal" class="close">&times;</span></a>
        <h2>Checkout</h2>
        <form action="index.php?action=processCheckout" method="POST">
            <div>
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" required autocomplete="on">
            </div>
            <div>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" required autocomplete="on">
            </div>
            <div>
                <label for="address">Shipping Address:</label>
                <textarea name="address" id="address" rows="4" required autocomplete="on"></textarea>
            </div>
            <div>
                <img src="views/images/paymentsQR.jpg" alt="Payment QR Code">
            </div>
            <div>
                <label for="payment">Payment Information:</label>
                <input type="text" name="payment" id="payment" required autocomplete="off" placeholder="Enter the transaction id for your payment.">
            </div>
            <h2>Cart Items:</h2>
    <table>
        <tr cellpadding="2px">
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <?php 
        $Items = $_SESSION['cart'];
        foreach ($Items as $item): 
        ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price']; ?></td>
            </tr>
        <?php 
            endforeach;
        ?>
    </table>

    <h3>Total: $<?php echo $_SESSION['cartAmount']; ?></h3>
            <div>
                <button type="submit">Complete Purchase</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Get the modal and the close button
    const checkoutModal = document.getElementById('checkoutModal');
    const closeModal = document.getElementById('closeModal');

    // Show the modal immediately on page load
    window.onload = function() {
        checkoutModal.style.display = 'flex';
    }

    // Close the modal when the close button (x) is clicked
    closeModal.onclick = function() {
        checkoutModal.style.display = 'none';
    }

    // Close the modal if the user clicks outside of the modal
    window.onclick = function(event) {
        if (event.target === checkoutModal) {
            checkoutModal.style.display = 'none';
        }
    }
</script>

</body>
</html>
