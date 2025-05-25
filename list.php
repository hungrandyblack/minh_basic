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

$sql = "SELECT * FROM users";
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
</head>

<body>
    <h1>List User</h1>
    <div>
        <a class="btn btn-success" href="create_user.php"> tạo users</a>
    </div>
    <table class="table mt-4">
        <thead>
            <th>Email</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($result as $user): ?>
                <td><?= $user['email'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><a href="" class="btn btn-primary">edit</a>
                    <a href="" class="btn btn-danger">delete</a>
                </td>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>