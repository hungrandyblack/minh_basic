<?php
include_once "./layout/head.php";
include_once "./layout/header.php";
include_once "./layout/body.php";

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
<?php
include_once "./layout/footer.php";
?>
