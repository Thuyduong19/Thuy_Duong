<?php
session_start(); 

// Kết nối cơ sở dữ liệu
$server = $_SESSION['server'];
$database = $_SESSION['database'];
$password = $_SESSION['password'];
$username = $_SESSION['username'];

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (!isset($_SESSION['courses'])) {
    $sql = "SELECT Id, Title, Description, ImageUrl FROM course";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['courses'] = $result->fetch_all(MYSQLI_ASSOC); // Lưu vào session
    } else {
        $_SESSION['courses'] = []; // Không có khóa học nào
    }
}

$courses = $_SESSION['courses'];
?>