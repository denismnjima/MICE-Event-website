<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and store in variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // For simplicity, we'll assume data is successfully received
    echo "Thank you, $name. Your message has been received!";
} else {
    echo "Invalid request method.";
}
