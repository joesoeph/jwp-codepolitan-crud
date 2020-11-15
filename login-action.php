<?php
session_start();
include('connection.php');

if(!$_SESSION) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
	$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

	if($results) {
		$_SESSION['id'] = $results[0]['id'];
		$_SESSION['username'] = $results[0]['username'];
		$_SESSION['fullname'] = $results[0]['fullname'];
		$_SESSION['date_of_birth'] = $results[0]['date_of_birth'];
		$_SESSION['short_bio'] = $results[0]['short_bio'];
		$_SESSION['avatar_url'] = $results[0]['avatar_url'];
		$_SESSION['gender'] = $results[0]['gender'];
	    header('Location:dashboard.php');
	} else {
	    echo 'Username atau password salah!';
	}

} else {
    header('Location:dashboard.php');
}
?>