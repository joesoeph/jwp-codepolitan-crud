<?php
session_start();
if(!$_SESSION){
    header('Location:index.php');
    exit();
}

include('connection.php');

$id = $_POST['id'];
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$short_bio = $_POST['short_bio'];
$avatar_url = $_POST['avatar_url'];

$update = mysqli_query($connect,"UPDATE users SET username='$username', fullname='$fullname', date_of_birth='$date_of_birth', gender='$gender', short_bio='$short_bio', avatar_url='$avatar_url' WHERE id='$id' ");

if($update) 
    header('Location:profile.php?msg=true');
else
    header('Location:profile.php?msg=false');
?>