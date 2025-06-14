<?php
session_start();
include_once "./layout/head.php";
include_once "./layout/header.php";
include_once "./layout/body.php";
?>
<h1>Tạo user</h1>
<form action="action.php" method="post">
  <!-- get là mặc định -->
  <?php if (!empty($_SESSION['message'])): ?>
    <div class="alert alert-danger">
      <p class="alert-danger"><?= $_SESSION['message'] ?></p>
    </div>
  <?php endif; ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
include_once "./layout/footer.php";
?>