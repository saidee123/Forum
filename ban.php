<?php
include('login.php');
$username  = $_GET['id'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "forum";
if ($_SESSION["account_type"] ==2){
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} 
	
$sql = "UPDATE account SET ban_status=1 WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    echo "'$username' has been banned!";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>