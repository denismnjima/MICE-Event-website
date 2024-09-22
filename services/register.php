<?php

require 'db.php';
require 'email.php';

header('Content-Type: application/json');

$response = [];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data and sanitize input
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $organization = isset($_POST['org']) ? trim($_POST['org']) : '';

    // Basic validation
    if (empty($name)) {
        $response['errors']['name'] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors']['email'] = 'Valid email is required';
    }
    
    if (empty($phone)) {
        $response['errors']['phone'] = 'Phone number is required';
    }

    // If no errors, insert data into database
    if (empty($response['errors'])) {
        $query = "INSERT INTO event (name, email, phone_number, organization) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $phone, $organization);
            if (mysqli_stmt_execute($stmt)) {
                $response['success'] = true;
                $response['message'] = 'Registration successful!';
                send_email($email,$name,'register');
            } else {
                $response['success'] = false;
                $response['message'] = 'Error while saving data. Please try again.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $response['success'] = false;
            $response['message'] = 'Database error: Unable to prepare statement';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Validation errors occurred';
    }
    
    // Close the database connection
    mysqli_close($conn);
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method';
}

// Send the JSON response
echo json_encode($response);
?>
