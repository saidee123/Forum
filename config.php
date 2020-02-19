<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "forum";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
// Check connection

}
?>