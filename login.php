<?php 
session_start();
include "db_conn.php";

function validate($data){
    // Perform checks on $data
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username) || empty($password)) {
        header("Location: index.php?error=empty_fields");
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])) {
            // Password is correct, start the session
            session_regenerate_id(); // Regenerate session ID to prevent session fixation attacks
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        } else {
            // Incorrect password
            header("Location: index.php?error=incorrect_password");
            exit();
        }
    } else {
        // No user found
        header("Location: index.php?error=user_not_found");
        exit();
    }
} else {
    // Redirect to index page if accessed directly without POST request
    header("Location: index.php");
    exit();
}
?>
