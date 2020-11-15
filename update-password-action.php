<?php
session_start();
if(!$_SESSION){
    header('Location:index.php');
    exit();
}

include('connection.php');

$id = $_POST['id'];
$password = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']);

$update = mysqli_query($connect,"UPDATE users SET password='$password' WHERE id='$id' ");

if($update || ($password === $confirm_password)) 
    header('Location:profile.php?msg=true');
else
    header('Location:profile.php?msg=false');
?>