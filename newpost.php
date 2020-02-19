<?php
$post_title = $_POST['post_title'];
$post_text = $_POST['post_text'];
$post_board = $_POST['post_board'];
$account_type = $_POST['account_type'];
if ($_POST['sticky']!="yes") {
	$sticky = "";
}else{
	$sticky = $_POST['sticky'];
}
if ($sticky !="" and $account_type ==0) {
	$sticky = "";
}

$original_poster = $_POST['username'];;
$date = date('Y/m/d H:i:s');


	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "forum";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	
	$INSERT = "INSERT Into thread (post_title, post_text, date, post_board ,original_poster,sticky) values(?,?,?,?,?,?)";

	$stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $post_title, $post_text, $date, $post_board ,$original_poster,$sticky);
      $stmt->execute();
$stmt->close();
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>