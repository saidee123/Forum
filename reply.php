<?php

$post_id = $_POST['post_id'];
$reply_text = $_POST['reply_text'];
$reply_user = $_POST['username'];


	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "forum";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	
	$INSERT = "INSERT Into reply (post_id, reply_text, reply_user) values(?,?,?)";

	$stmt = $conn->prepare($INSERT);
      $stmt->bind_param("iss", $post_id, $reply_text, $reply_user);
      $stmt->execute();
$stmt->close();
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>