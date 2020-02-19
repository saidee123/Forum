<?php

// Initialize the session
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 

 
// Include config file
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
    } else{
        $spassword = trim($_POST["password"]);
    }
    
        $sql = "SELECT id, username, password ,account_type ,ban_status FROM account WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $password,$account_type,$ban_status);
                    if(mysqli_stmt_fetch($stmt)){
                        if($spassword == $password){
                             if(!isset($_SESSION)) 
								{ 
									session_start(); 
								} 
                            
                           $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
							$_SESSION["account_type"] = $account_type; 
							$_SESSION["ban_status"] = $ban_status; 
							header("location: mmuforum.php");
                            
                        } else{
                            print "The password is not valid.";
                        }
                    }
                } else{
                   print "No account with that username exist";
                }
            } else{
                echo "Error, something went wrong!";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    

    // Close connection
    mysqli_close($link);
}
?>
