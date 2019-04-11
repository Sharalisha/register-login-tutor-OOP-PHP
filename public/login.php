<?php
    session_start();  //start of session
    require_once '../private/connections.php';		//initialize the web site

    $tutor = new Tutor();	//an instances (object) of the Tutor class

	if (isset($_POST['submit'])) {			//checks if the submit is set or not
		extract($_POST);  		//gets the form details passed thrugh http post method

			//call to verify_Tutor method to verify the tutor if he/she is already registered in digital tutor
	        $login = $tutor->verify_Tutor($username, $password);    
	            if ($login) {
	                // Successful login with direct to details page to view his/ hers details 
                    header("location:details.php?id=$_SESSION[w1673560_ID]");
	            } else {
                    // login failed, due to wrong name or password
                    echo "<script> alert ('Wrong username or password') </script> ";
                }
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Digital Tutor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main.css">		<!--reference to the external style sheet file-->
		<style>

			form{
			    padding: 10px 20px 30px 20px;
			    margin: 30px 490px 30px 495px ;
			}
			button{
			    width: 350px; 
			    height: 45px;
			    font-size: 18px;
            }
            
		</style>
        <script type = "text/javascript" language = "javascript" > 
	        function submitlogin() {
				 //validation 
		    var form = document.login;
		        if (form.logusername.value == "") {  //ensures username is entered 
			        alert("Enter username.");
			        return false;
		        } else if (form.password.value == "") {
			        alert("Enter password.");		//ensures password is entered 
			        return false;
                }
	        }
        </script>
	</head>
	<body>
		<div class="in"style="margin-top: 100px;">
            <h1 style="letter-spacing: 3px;  color: #06159b;"> Digital Tutor </h1>
            
			<form action="login.php" method="POST" name="login">
                <h2 > <strong> Tutor Log In </strong> </h2>
				
				<!--input field for username with label-->
				<label for="username"> <strong> Username </strong></label> <br>
				<input type="text" name="username" size="35" required="" style="width: 350px; height: 25px; font-size: 15px;">
                <br> <br>
				
				<!--input field for password with label-->
				<label for="pass"> <strong>Password </strong></label> <br>
				<input type="password" name="password" required=""  style="width: 350px; height: 25px; font-size: 15px;">
                <br><br>
				
				<label style=" font-size: 17px;"> <input type="checkbox" style="width: 15px; height: 15px;"> <strong>  Remember me </strong> </label> <br> <br>
				<button onclick="return(submitlogin());" type="submit" name="submit" value="Login"><strong>  Login </strong></button>
			</form>
		</div>
	</body>
</html>