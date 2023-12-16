<?php
$User_name = $_POST['User_name'];
$pass = $_POST['pass'];

$conn = new mysqli('localhost', 'root', '', 'member');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT * FROM users WHERE User_name = ?");
    $stmt->bind_param("s", $User_name);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $user = $stmt_result->fetch_assoc();
        // Check the password directly (assuming it's stored in plain text)
        if ($pass === $user['pass']) {
            echo "<h2>Login successful</h2>";
        } else {
            echo "<h2>Invalid password</h2>";
        }
    } else {
        echo "<h2>User not found</h2>";
    }

    $stmt->close();
    $conn->close();
}
?>

