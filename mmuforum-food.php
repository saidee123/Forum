<?php
include('login.php');

if (!isset($_SESSION["loggedin"])){
	$_SESSION["loggedin"] = false; 
	$_SESSION["username"] = "";
	$_SESSION["account_type"]= 0;
}
$account_type = $_SESSION["account_type"];

$isloggedin = $_SESSION["loggedin"];
$username =  $_SESSION["username"];
// If not logged in, send back to home page.
if ($isloggedin === true ){
	echo "<script>window.onload = function () { document.getElementById('login').style.display='none';}</script";
}else {
header("location: mmuforum.php");
}
if ($_SESSION["ban_status"]==1){
	header("location: banned.html");
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Food</title>
   <link rel="stylesheet" href="reset.css" />
   <link rel="stylesheet" href="mmuforum-board.css" />
    <style>
   .login p{ color: white;  padding: 10px; font-size: 17px;
}
	
   </style>
</head>
<script>
function showNewPost() {
  document.getElementById('newpost').style.display='block';
    document.getElementById('cancel').style.display='block';

}

function hideNewPost() {
  document.getElementById('newpost').style.display='none';
   document.getElementById('cancel').style.display='none';
}
</script>
<body>

<div class="topbar">
</div>
<div class= "bartext">
<img class ="logo" src="mmulogo.png" alt="MMU Logo" width="108" height="80">
  <a href="mmuforum.php">HOME</a>
</div>
 <div class="login" >
 
	 <?php
	if ($isloggedin === true){	 
		echo "<p>User: $username</p>";  
	}	 
	?>
  </div>
  <form action="logout.php" method="POST" id="logout">
		<button type="submit"  >Logout</button>
	</form>
 
	
  <img class="boardpic" src="food.png" alt="food logo" width="208" height="180">
  <h1>Food</h1>
   <button class="newpostbutton" onclick="showNewPost()">New Post</button>  
   <form action="newpost.php" method="POST" id="newpost"  style="display:none;">
   <label>Create a new topic</label><p>
      Title:<input type="text" placeholder="Enter title here" name="post_title" required ><p>
      <textarea name="post_text" rows="10" cols="80" placeholder="Enter content here" required></textarea><p>
	  <input type="text" style="display:none;" name="username" value=<?php echo $username?> >
	  	  <input type="hidden"  name="account_type" value=<?php echo $account_type?> >
	  	<input type="hidden" style="display:none;" name="post_board" value="food" >
		<p id="stickcheck"  style="display:block;">Sticky:<input type="checkbox" name="sticky" value="yes" id="sticky"></p>
      <button type="submit">Submit</button>
	   

    </form>
	<button id="cancel" onclick="hideNewPost()" style="display:none;">Cancel</button>

   <?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "forum";
	
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
   } 
  
 $sql = "SELECT post_id,post_title, date, original_poster FROM thread WHERE post_board = 'food' AND sticky = 'yes' ORDER BY post_id DESC" ;
$result = $conn->query($sql);
    echo "<table class='topictable' cellspacing='0'><tr><th></th><th id='topic'>Topic</th><th id='op'>Post by</th><th id='date'>Date</th></tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td><img src='topicsticky.png' width='30' height='30'></td>";
		echo '<td ><a href="topic.php?id=' . $row['post_id'] . '">' . $row['post_title'] . '</a></td>';
        echo "<td >" . $row["original_poster"]. "</td><td>" . $row["date"]. "</td>";
		echo '</tr>';
    }
	
} else {
   
}
 $sql = "SELECT post_id,post_title, date, original_poster FROM thread WHERE post_board = 'food' AND sticky != 'yes' ORDER BY post_id DESC" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td><img src='topic.png' width='30' height='30'></td>";
		echo '<td ><a href="topic.php?id=' . $row['post_id'] . '">' . $row['post_title'] . '</a></td>';
        echo "<td >" . $row["original_poster"]. "</td><td>" . $row["date"]. "</td>";
		echo '</tr>';
    }
} else {
}
   echo "</table>";
$conn->close();
   ?>


</body>
</html>