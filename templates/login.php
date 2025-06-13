<?php
session_start();
require_once '../db.php';  // Include the database connection

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");  // Redirect to profile page if logged in
    exit();
}

// Initialize variables
$error_message = "";

// Process the form data when the user submits it
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize and validate input data
    $username = filter_var($username, FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($password);

    // SQL query to check if the email exists in the database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the user exists, verify the password
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($password=== $user['password']) {
            // Store user session variables
            //$_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            //echo "login success";
            // Redirect to profile page
           header("Location: ../index.php?action=home");
            exit();
        } else {
            $error_message = "Invalid password.";
            echo "invalid password";
        }
    } else {
        $error_message = "No user found with that email.";
        echo "no user found";
    }
    
}
?>

