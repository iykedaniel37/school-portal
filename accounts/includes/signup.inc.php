<?php
require '../../includes/db.php';
include './functions.php';
if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname =  mysqli_real_escape_string($conn,$_POST['lastname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
  

if(emptySignup($firstname, $lastname, $username, $email, $password, $confirm_password) !== false){
    header('location: ../signup.php?signup=empty');
} else if(invalidCharacterSignup($firstname, $lastname, $username) !== false){
     header('location: ../signup.php?signup=invalidcharacter&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username);
} else if(invalidEmailSignup($email) !== false){
     header('location: ../signup.php?signup=invalidemail&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username);

} else if(invaliPasswordlength($password) !== false){
     header('location: ../signup.php?signup=invalidpasslength&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username.'&email='.$email);

} else if(invaliPasswordMatch($password, $confirm_password) !== false){
     header('location: ../signup.php?signup=invalidpassMatch&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username.'&email='.$email);

} else if(userExist($conn, $username, $email) !== false){
     header('location: ../signup.php?signup=userexist&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username.'&email='.$email);

}else{

    SignupUser($conn, $firstname, $lastname, $username, $email, $password);
}



    
}