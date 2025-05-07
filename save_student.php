<?php
include 'db.php'; // Make sure db.php connects to attendance_system DB

$name = $_POST['name'] ?? '';
$number = $_POST['number'] ?? '';
$city = $_POST['city'] ?? '';
$rollNo = $_POST['rollNo'] ?? '';

if (!$name || !$number || !$city || !$rollNo) {
    echo "error: Missing data";
    exit();
}

$sql = "INSERT INTO students (name, number, city, roll_no) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $number, $city, $rollNo);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error: " . $stmt->error;
}
?>
