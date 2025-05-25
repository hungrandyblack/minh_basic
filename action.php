<?php
session_start();
$email = $_POST['email'];
$passwordInput = $_POST['password']; // Tránh trùng biến với $password ở dưới
var_dump($email, $passwordInput);

$servername = "localhost";
$username = "root";
$password = ""; // dùng cho kết nối DB
$dbname = "test_minh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape dữ liệu đầu vào để tránh SQL Injection
$email = $conn->real_escape_string($email);

// Thêm LIMIT 1 để chỉ lấy 1 dòng dữ liệu
$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Lấy dòng đầu tiên
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";

    if ($passwordInput == $row['password']) {
        $_SESSION['message'] ="dang nhap thanh cong";
        // dang nhap thanh cong
        header('location:list.php');
    } else {
        // dang nhap khong thanh cong
        $_SESSION['message'] ="dang nhap that bai";

        header('location:login.php');
    }
} else {
    echo "0 results";
}

$conn->close();
