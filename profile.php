<!DOCTYPE html>
<html>
    <style>
        .profile-page{
            display: flex; /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1); /* Semi-transparent black background */
            justify-content: right;
            align-items: right;
            z-index: 1000;
        }

        .profile-form {
            margin: 10vh;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            height: 20vh;
            position: relative;
        }

        .profile-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-form ul {
            list-style: none;
        }
        .profile-form ul li a {
            text-decoration: none;
        }

    </style>
    <body>
        <div class="profile-page">
            <div class="profile-form">
                <a href="index.php?action=home"><span id="closeModal" class="close">&times;</span></a>
                <h2>Profile</h2>
                <div>
                    <h4>Hello, <?php echo $_SESSION['username']?></h4>
                    <ul>
                        <li><a href="index.php?action=myorders">My Orders</a></li>
                    </ul>
                </div><br>
                <a href="index.php?action=signout"> <button type="submit">Logout</button></a>
            </div>
        </div>
    </body>
</html>