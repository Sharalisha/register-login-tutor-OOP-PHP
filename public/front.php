<!DOCTYPE html>
<html>
	<head>
		<title> Digital Tutor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main.css">		<!--reference to the external style sheet file-->
		<style>

			button {
			  width: 25%;
			  font-size: 18px;
			  border-radius: 30px;
			  padding: 14px 20px;
			  margin: 0px 38%;
      }
      
		</style>
	</head>
	<body>
		<div class="sqr">
      <img src="sara.jpg" alt="Snow" style="width:100%; opacity: 0.8;">  <!--front page image-->
      
			<div class="top-right">WELCOME TO <br>  
				<strong> DIGITAL TUTOR </strong>
      </div>
			
			<!--login button with hyperlink to login.php when triggered, for a tutor to login-->
			<button type="submit" value=""style="margin-top: 20px;"> <strong> 
			<a href="login.php" style=" text-decoration: none; color: white;"> Tutor Log In  </a> </strong></button> <br> <br>
		 
			<!--tutor sign up button with hyperlink to signup.php when triggered, for a new tutor to signup/get registered to digital tutor-->
			<button type="submit" value="" > <strong> 
      <a href="signup.php" style=" text-decoration: none; color: white;"> Tutor Sign Up</a></strong></button> 
			
			<!--view subject button with hyperlink to viewSub.php when triggered, to view all the subjects taught at digital tutor-->
			<button type="submit" value="" style="margin-bottom: 30px; margin-top: 17px;" > <strong> 
			<a href="viewSub.php" style=" text-decoration: none; color: white;"> View Subjects </a></strong></button> 
		</div>
	</body>
</html>