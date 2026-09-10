<?php
include 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'customer';

    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Enter all the information."]);
        exit;
    }

    // Checking if the email address already exists
    $checkQuery = "SELECT id FROM users WHERE email = ?";
    $params = array($email);
    $stmtCheck = sqlsrv_query($conn, $checkQuery, $params);

    if ($stmtCheck && sqlsrv_has_rows($stmtCheck)) {
        echo json_encode(["status" => "error", "message" => "This email address is already in use."]);
        exit;
    }

    // Hashing the password (for security)
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Inserting into the database
    $insertQuery = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $insertParams = array($name, $email, $hashedPassword, $role);
    $stmtInsert = sqlsrv_query($conn, $insertQuery, $insertParams);

    if ($stmtInsert) {
        echo json_encode(["status" => "success", "message" => "Registration successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "An error occurred."]);
    }
}
?>