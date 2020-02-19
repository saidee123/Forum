<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$account_type = $_POST['account_type'];

if (!empty($username) || !empty($password) || !empty($email) || !empty($account_type)){
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "forum";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From account Where email = ? Limit 1";
     $INSERT = "INSERT Into account (username, password, email, account_type) values(?, ?, ?, ?)";
	 
	 $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssi", $username, $password, $email, $account_type);
      $stmt->execute();
	  print "<h2>Congratulation. You are now a member of MMU Forum!</h2>";
	  print "<a href=mmuforum.php>Click here to redirect to home page</a>";

     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
	 
    }
	 
	 
} else  {
		echo "You are required to fill all the fields";
		die();
}

	 


?>