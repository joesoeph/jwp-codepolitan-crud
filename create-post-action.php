<?php
session_start();
if(!$_SESSION){
    header('Location:index.php');
    exit();
}

include('connection.php');

$title = $_POST['title'];
$cover_url = $_POST['cover_url'];
$content = $_POST['content'];

$insert = mysqli_query($connect,"INSERT INTO posts SET title='$title', cover_url='$cover_url', content='$content'"); 

if($insert) 
    header('Location:posts.php?msg=true');
else
    header('Location:posts.php?msg=false');