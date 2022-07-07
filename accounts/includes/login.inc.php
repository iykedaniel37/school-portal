<?php
include '../../includes/db.php';
include './functions.php';
if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    

    if(emptyLogin($user, $password) !== false){
  die("empty inputs");
    }
    
    if(userExistLogin($conn, $user) === false ){
die("user not found");
    }


    loginUser($conn, $user, $password);
}