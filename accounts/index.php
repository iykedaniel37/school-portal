<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
include './includes/links.php'
?>
    <title>Document</title>
</head>
<body>
    <?php
include './includes/header.php';
echo $_SESSION['username'];
?>

<?php
include '.././includes/footer.php';
?>