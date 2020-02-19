<?php

include('login.php');
if (!isset($_SESSION["loggedin"])){
	$_SESSION["loggedin"] = false; 
	 $_SESSION["username"] = "";

}
$isloggedin = $_SESSION["loggedin"];
$username =  $_SESSION["username"];
if ($isloggedin === true){
	echo "<script>window.onload = function () { document.getElementById('login').style.display='none';}</script";

}

?>

<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>MMU Forum</title>
   <link rel="stylesheet" href="reset.css" />
   <link rel="stylesheet" href="mmuforum.css" />
   <style>
   .login p{ color: white;  padding: 10px; font-size: 17px;
}
	
   </style>
</head>
<body>

<div class="topbar">
</div>
<div class= "bartext">
<img class ="logo" src="mmulogo.png" alt="MMU Logo" width="108" height="80">
  <a href="mmuforum.php">HOME</a>
</div>
 <div class="login" >
    <form action="login.php" method="POST" id="login">
      <input type="text" placeholder="Username" name="username" required>
      <input type="password" placeholder="Password" name="password" required>
      <button type="submit">Login</button>
	   <a href="register-page.php" ><p>No account? Click here!</p></a>
    </form>
	 <?php
	if ($isloggedin === true){	 
		echo "<p>User: $username</p>";  
	}	 
	?>
  </div>
  <form action="logout.php" method="POST" id="logout">
		<button type="submit" value="Run me now!" >Logout</button>
	</form>

  <h1>Welcome to MMU Forum!</h1>
  <table  cellspacing="0">
  <tr ><th class="boardrow" colspan="2">Boards</th>
  </tr>
  <tr>
  <th><u>Campus</u><a href="mmuforum-food.php"><p>Food</p></a><a href="sportpage.php"><p>Sport</p><a href="hostelpage.php"><p>Hostel</p></a></a><a href="FitnessPage.php"><p>Fitness</p></a><a href="GamesPage.php"><p>Games</p></a></th>
  
  <th><u>Study</u><a href="Q&A.php"><p>Question&Answer</p></a><a href="multimedia.php"><p>Multimedia</p></a>
  </tr>
	
  </table>


</body>
</html>