<?php
function emptySignup($firstname, $lastname, $username, $email, $password, $confirm_password){
if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($confirm_password)){
    return true;
}
return false;
}

function invalidCharacterSignup($firstname, $lastname, $username){
    if(!preg_match("/^([a-zA-Z' ]+)$/",$firstname) || !preg_match("/^([a-zA-Z' ]+)$/",$lastname) || !preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username) ){
        return true;
    }
    return false;
}

function invalidEmailSignup($email){
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return true;
}
return false;
}

function invaliPasswordlength($password){
    if(strlen($password) < 8){
        return true;
    }
    return false;
}

function invaliPasswordMatch($password, $confirm_password){
    if($password !== $confirm_password){
        return true;
    }
    return false;
}

function SignupUser($conn, $firstname, $lastname, $username, $email, $password){

    $hashedpassword  =  password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(firstname,lastname,username,email,password) VALUES(?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header('location: ../signup.php?signup=stmtnotfound');
};
mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $username, $email, $hashedpassword);
    $result = mysqli_stmt_execute($stmt);
    if($result){
        header("Location: ../signup.php?signup=success");
    }
    mysqli_stmt_close($stmt);
}

// create the sql query with placeholders for the entries,
// initialize connection
// prepare the statement
// bind parameters
// execute statement
// close statement
function userExist($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header('location: ../signup.php?signup=stmtnotfound');
};
mysqli_stmt_bind_param($stmt, 'ss',  $username, $email);
    mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_assoc($result)){
    return $row;
}else{
    return false;

}

}


///  login

function emptyLogin($user, $password){
    if(empty($user) || empty($password)){
return true;
    }
    return false;
    
}

function userExistLogin($conn, $user){
     $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header('location: ../signup.php?signup=stmtnotfound');
};
mysqli_stmt_bind_param($stmt, 'ss',  $user, $user);
    mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_assoc($result)){
    return $row;
}else{
    return false;

}
}

function loginUser($conn, $user, $password){
$userexist = userExistLogin($conn, $user);
$pass = $userexist["password"];
if(!password_verify($password, $pass)){
    die("Wrong password");
}

session_start();
$_SESSION['username'] = $userexist["username"];
echo 'login success';
exit();
}