<!DOCTYPE html>
<html lang="en">
<head>
<?php
include '../includes/links.php'
?>
    <title>Document</title>
</head>
<body>

<?php
include './includes/header.php'
?>


<div class="container ">
    <div class="row justify-content-center">
      <div class="col-7 bg-white shadow border p-5">
          <p class="h2 mb-4 text-uppercase text-center">Create A new Account</p>
          <form action="./includes/signup.inc.php" method="POST">
          <div class="row">
            <div class="col">
<?php

if(isset($_GET['firstname'])){
  echo '        <div class="form-floating mb-3">
  <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="First Name" name="firstname" value="'.$_GET['firstname'].'">
  <label for="floatingInput">First Name</label>
</div>';
}else{
  echo '        <div class="form-floating mb-3">
  <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="First Name" name="firstname">
  <label for="floatingInput">First Name</label>
</div>';
}
      ?>
            </div>
            <div class="col">
              <?php
              if(isset($_GET['lastname'])){
                echo '              <div class="form-floating mb-3">
  <input type="text" class="form-control  shadow-none" id="floatingPassword" placeholder="Last Name" name="lastname" value="'.$_GET['lastname'].'">
  <label for="floatingPassword">Last Name</label>

</div>';
              }else{
                echo '              <div class="form-floating mb-3">
  <input type="text" class="form-control  shadow-none" id="floatingPassword" placeholder="Last Name" name="lastname">
  <label for="floatingPassword">Last Name</label>

</div>';
              }
?>
            </div>
          </div>


        <?php
        if(isset($_GET['username'])){
          echo '<div class="form-floating mb-3">
  <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="Username" name="username" value="'.$_GET['username'].'">
  <label for="floatingInput">Username</label>
</div>';
        } else{
          echo '<div class="form-floating mb-3">
  <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="Username" name="username">
  <label for="floatingInput">Username</label>
</div>';
        }
?>
<?php
if(isset($_GET['email'])){
echo '<div class="form-floating mb-3">
  <input type="email" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="email" value="'.$_GET['email'].'">
  <label for="floatingInput">Email address</label>
</div>';
}else{

  echo '<div class="form-floating mb-3">
  <input type="email" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="email">
  <label for="floatingInput">Email address</label>
</div>';
}
?>
<div class="form-floating mb-3">
  <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Password" name="password">
  <label for="floatingPassword">Password</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Confirm Password" name="confirm_password">
  <label for="floatingPassword">Confirm Password</label>
</div>
<div class="d-grid"><button class="btn btn-danger fs-5" name="submit" type="submit">Create Account</button></div>
  </form>

  <?php 
  if(isset($_GET['signup'])){
    $signup = $_GET['signup'];
    if($signup === 'empty'){
      echo '<div class="alert alert-danger alert-dismissible fade show mt-2">
      <p>Please fill in all the inputs</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else if($signup === 'invalidcharacter') {
      echo '<div class="alert alert-danger alert-dismissible fade show mt-2">
      <p>Please enter a valid character</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }else if($signup === 'invalidemail') {
      echo '<div class="alert alert-danger alert-dismissible fade show mt-2">
      <p>Please enter a valid email address</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  
  }else if($signup === 'invalidpasslength') {
      echo '<div class="alert alert-danger alert-dismissible fade show mt-2">
      <p>Your password is too short</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  else if($signup === 'invalidpassMatch') {
         echo '<div class="alert alert-danger alert-dismissible fade show mt-2">
      <p>Your password do not match</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  } else if($signup === 'userexist'){
      echo '<div class="alert alert-danger alert-dismissible fade show mt-2">
      <p>There is a user already with this username</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  } else if($signup === 'success'){
       echo '<div class="alert alert-success alert-dismissible fade show mt-2">
      <p>You have signed up successfully</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
}
  
  ?>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php'
?>
    