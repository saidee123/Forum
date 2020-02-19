<!DOCTYPE HTML>
<html>
<head>
  <head lang="en">
   <meta charset="utf-8">
   <title>Register</title>
   <style>
		body{ background-color: #111c3b;
			}
		fieldset{ background-color: white;
			   	padding: 15px 10px 15px 10px;
				  margin: 150px;
				   border: 2px solid #4CAF50;
				   font-size: 18px;
			}
		legend{ background-color: white; 
			padding: 5px 10px 10px 10px;
			 font-size: 20px;
			font-weight: normal;
			border: 2px solid #4CAF50;
			}
		.submit{
				margin: 10px;
			  float: right;
			  padding: 5px;
				font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif	;
			  color: black;
			  border: 2px solid #4CAF50; 
			  margin-left: 10px;
			   background-color: #4CAF50; /* Green */
			  border: none;
			  color: white;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 18px;
			  -webkit-transition-duration: 0.4s; /* Safari */
			  transition-duration: 0.4s;
			  border: 2px solid #4CAF50; /* Green */
			  border-radius: 2px;
			}
		.submit:hover{
			 background-color: white; /* Green */
		  color: black;
		}
   </style>
</head>
<body>
 <form action="register.php" method="POST">
 <fieldset>
 <legend>Registration Form</legend>
  <table>
   <tr>
    <td>Username :</td>
    <td><input type="text" name="username" required></td>
   </tr>
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" required></td>
   </tr>
   <tr>
    <td>Occupation :</td>
    <td>
     <input type="radio" name="account_type" value="0" required> Student
     <input type="radio" name="account_type" value="1" required> Lecturer
    </td>
   </tr>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" required  pattern=".+\.edu.my$"  placeholder="must use MMU email"></td>
   </tr>
   
   <tr>
    <td><input type="submit" value="Submit" class="submit"></td>
   </tr>
  </table>
   </fieldset>

 </form>
</body>
</html>