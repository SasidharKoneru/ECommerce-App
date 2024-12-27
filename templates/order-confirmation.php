<!-- views/order_confirmation.php -->
<html>
    <style>
        /* The Checkout Modal (Hidden by Default) */
        .order-confirm {
            display: none;
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
        .order-confirm-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            position: relative;
        }

        .order-confirm-content h1 {
            color: green;
        } 
        .order-confirm-content p {
            font-weight: bold;
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
    </style>
    <body>
    <div class="order-confirm" id="confirm-box">
    <div class="order-confirm-content">
        <a href="index.php?action=home"><span id="closeBox" class="close">&times;</span></a>
        <h1>Order Confirmation</h1>
        <p>Your order has been placed successfully! Your order ID is <?php echo $_GET['orderId']?></p>
    </div>
    </div>
    <script>
    // Get the modal and the close button
    const confirm_box = document.getElementById('confirm-box');
    const closeBox = document.getElementById('closeBox');

    // Show the modal immediately on page load
    window.onload = function() {
        confirm_box.style.display = 'flex';
    }

    // Close the modal when the close button (x) is clicked
    closeBox.onclick = function() {
        confirm_box.style.display = 'none';
    }

    // Close the modal if the user clicks outside of the modal
    window.onclick = function(event) {
        if (event.target === comfirm_box) {
            confirm_box.style.display = 'none';
        }
    }
</script>
    </body>

</html>



