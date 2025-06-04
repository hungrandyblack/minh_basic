<?php
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

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

} else {
    echo "0 results";
}
$conn->close();
// array -> object  
// array ['key' => "value"] : array['key'];
// object $object->key = value; : $object->key; object là phải có class: 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach ($result as $category):  ?>
            <li><a href="/client/product.php?category_slug=<?= $category['slug'] ?>"><?= $category['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>