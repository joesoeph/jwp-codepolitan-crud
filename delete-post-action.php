<?php
session_start();
if(!$_SESSION){
    header('Location:index.php');
    exit();
}

include('connection.php');

$id = $_GET['id'];

$delete = mysqli_query($connect, "DELETE FROM posts WHERE id='$id'");

if($delete)
    header('Location:posts.php?msg=true'); 
else
    header('Location:posts.php?msg=false');