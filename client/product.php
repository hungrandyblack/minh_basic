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
$category_slug = $_GET['category_slug']; // request get
// query category hien tai
$category_sql = "SELECT * FROM categories where slug = '$category_slug'";
$query = $conn->query($category_sql);
$category = $query->fetch_assoc();
// query product theo category hien tai
$category_id = $category['id'];
$sql = "SELECT * FROM products where category_id = $category_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .price {
            color: red;

        }

        .img-product {
            width: 200px;
            height: 200px;
        }
        .extra-div{
            background-color: #000;
        }
        .div-tong{
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="row col-md-12 div-tong">
        <div class="col-md-1 extra-div">

        </div>
        <div class="col-md-8 d-flex">
            <?php foreach ($result as $product):  ?>
                <div class="col-md-3">
                    <img src="<?= $product['image'] ?>" class="img-product" alt="">
                    <h3><?= $product['name'] ?></h3>
                    <strong class="price"><?= number_format($product['price_sale']) ?>đ</strong>
                    <p class="price_main"><?= number_format($product['price_main']) ?>đ</p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-1  extra-div">

        </div>
    </div>
    </ul>
</body>

</html>