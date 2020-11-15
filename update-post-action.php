<?php
session_start();
if(!$_SESSION){
    header('Location:index.php');
    exit();
}

include('connection.php');

$id = $_POST['id'];
$title = $_POST['title'];
$cover_url = $_POST['cover_url'];
$content = $_POST['content'];

$update = mysqli_query($connect,"UPDATE posts SET title='$title', cover_url='$cover_url', content='$content' WHERE id='$id' "); //menggunakan kondisi where untuk menyimpan dengan data spesifik

if($update) 
    header('Location:posts.php?msg=true');
else
    header('Location:posts.php?msg=false');
?>