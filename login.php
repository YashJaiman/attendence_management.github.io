<?php
session_start();
include 'db.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: student.php");
        exit();
    }
}
echo "<script>alert('Invalid username or password'); window.location.href = 'login.html';</script>";
?>