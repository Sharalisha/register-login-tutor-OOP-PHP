<?php
    session_start();
    require_once '../private/connections.php';		//initialize the web site

    $tutor = new Tutor();		//an instances (object) of the Tutor class
        if (isset($_POST['submit'])){    //checks if the submit is set or not
                $myArray = array(		//extracting the details entered in form as an array
                    "w1673560_firstName"    => $_POST["fName"],
                    "w1673560_username"     => $_POST["username"],
                    "w1673560_password"     => $_POST["password"],
                    "w1673560_dob"          => $_POST["dob"],
                    "w1673560_contactNo"    => $_POST["phoneNo"],
                    "w1673560_email"        => $_POST["email"],
                    "w1673560_qualification"=> $_POST["qualification"],
                    "w1673560_accountNo"    => $_POST["bankNo"]
                );
				$isExsist = $tutor->check_username($_POST["username"]);
				if (!$isExsist) {
					$query=$tutor-> reg_tutor("tutor",$myArray);  //call to reg_tutor function, to register tutor 
					if ($query){    
					/*on successful registration as tutor, addSub.php with be directed for 
					the tutor to add the suvjects he/she is will to teach*/
						header("location:../public/addSub.php?id=$query");				
					} else {		
						//on fail to register, due to username already existing
						echo "<script> alert('Registration failed. Error in Database.')</script>";		
					}
				} else {
					echo "<script> alert('Registration failed. Username already exits please try again.')</script>";	
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
			    margin: 25px 483px  25px 483px;
            }
            
			input{
			    width: 350px; 
			    height: 25px; 
            }
            
			button{
			    width: 160px; 
			    height: 45px;
			    font-size: 18px;
            }
            
		</style>
	</head>
	<body>
		<div class="in" style="margin-top: 40px;">
            <h1 style=" letter-spacing: 3px; color: #06159b; font-weight: 700;"> Digital Tutor </h1>
			
			<!--form to enter registration details, details passed to http post method-->
			<form autocomplete="off" method="POST">
                <h2> <strong> Tutor Sign up </strong> </h2>
				
				<!--input field for Full Name with label-->
				<label for="name"> <strong> Full Name </strong></label> <br> 
				<input type="text" name="fName" size="35" required=""> <br> <br>
				
				<!--input field for username with label-->
				<label for="username"> <strong> Username </strong></label> <br>
				<input type="text" name="username" size="35" required=""> <br><br>
				
				<!--input field for Password with label-->
				<label for="conPass"> <strong>Password </strong></label> <br>
				<input type="password" name="password" required="" > <br><br>
				
				<!--input field for Date of Birth with label-->
				<label for="dob"> <strong> Date of Birth </strong>  &nbsp</label>
				<input type="date" name="dob" size="35" required=""> <br> <br> 
				
				<!--input field for Contact No with label-->
				<label for="phNo"> <strong> Contact No </strong></label> 
				<input type="number" name="phoneNo" maxlength="10" required="" > <br><br>
				
				<!--input field for E-mail with label-->
				<label for="email"> <strong> E-mail </strong></label> <Br>
				<input type="email" name="email" required=""> <br><br>
				
				<!--input field for Qualification with label-->
				<label for="qualif"> <strong> Qualification </strong></label>
				<input type="text" name="qualification" id="qualif" required=""> <br><br>
				
				<!--input field for Bank Account No with label-->
				<label for="bankNo"> <strong> Bank Account No </strong></label> <br>
				<input type="number" name="bankNo" maxlength="12" required=""> <br><br>
				
				<!--submit button to submit the details entered in form-->
				<button type="submit" name="submit" value="Register" ><strong>  Submit </strong></button>

				<!--clear button to clear all details entered in the form when required-->
				<button type="reset" value="clear" style="margin-left: 15px;"> <strong>  Clear </strong></button>
			</form>
		</div>
	</body>
</html>