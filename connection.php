<?php

try {
	$connect = mysqli_connect("localhost", "root", "", "jwpcp_db");
	if(!$connect){
		throw new Exception('Unable to connect');
	}
} catch (Exception $e) {
	echo 'Message: ' .$e->getMessage();
}