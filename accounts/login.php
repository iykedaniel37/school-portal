<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include './includes/links.php'
  ?>
  <title>Document</title>
</head>
<body>
    <?php
    include './includes/header.php'
    ?>
    <div class="row justify-content-center">
      <div class="col-7 bg-white shadow border p-5">
          <p class="h2 mb-4 text-uppercase text-center">Login</p>
          <form action="./includes/signup.inc.php" method="POST" id="login_frm">
            <div class="form-floating mb-3">
  <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="Email or Username" name="user">
  <label for="floatingInput">Email Or Username</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Password" name="password">
  <label for="floatingPassword">Password</label>
</div>
<div class="d-grid"><button class="btn btn-danger fs-5" name="submit" type="submit">Login</button></div>
            </form>
            
            </div>
            </div>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="../assets/js/login.js"></script>
<?php
include '../includes/footer.php'
?>