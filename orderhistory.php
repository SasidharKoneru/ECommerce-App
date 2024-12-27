<!DOCTYPE html>
<html>
    <style>
        .orders-page {
            display: flex;
        }
        .orders-list {
            position: fixed;
            top: 100px;
            right: 20px;
            width: 20vw;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 8px rgba(243, 239, 239, 0.1);
            padding: 20px;
            z-index: 101;
            height: 40vh;
            overflow-y: auto;
            scrollbar-width: 0px;
        }

        .orders-list ul li {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
    </style>
    <body>
        <div class="orders-page">
            <div class="orders-list">
               <strong>Your Orders</strong>
                <ul>
                    <li>
                        <P>Order Id: 123</P>
                        <p>Order Date: </p>
                        <p>Order Amount: $1000</p>
                        <a href="">Details</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <P>Order Id: 123</P>
                        <p>Order Date: </p>
                        <p>Order Amount: $1000</p>
                        <a href="">Details</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <P>Order Id: 123</P>
                        <p>Order Date: </p>
                        <p>Order Amount: $1000</p>
                        <a href="">Details</a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>