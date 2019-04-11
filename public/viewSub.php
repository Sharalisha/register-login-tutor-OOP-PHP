<?php
  require_once '../private/connections.php';			//initialize the web site
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Digital Tutor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main.css">			<!--reference to the external style sheet file-->
		<style>

			button{
			  width: 100px; 
			  height: 30px;
			  font-size: 15px;
      }
      
			table, th, td {
			  border: 2px solid black;
			  border-collapse: collapse;
			  font-size: 15px;
			  padding: 7px;
			  text-align: left; 
			  margin-top: 30px;
      }
      
		</style>
	</head>
	<body>
		<div class="in" style="margin-top: 50px;">
			<h1 style=" letter-spacing: 3px;  color: #06159b;"> Digital Tutor </h1>
			<h2> <strong> Subjects taught at Digital Tutor </strong> </h2>
			<?php
				?>
			<table align="center">
				<tr>
					<th>Subject Code</th>
					<th>Subject title</th>
					<th>Subject Description</th>
					<th>Subject Fee</th>
        </tr>
        
				<?php 
					$subject = new Subject();		//an instances (object) of the subject class
					$mysub= $subject-> fetch_record("subject", "all");		//call to fetch_record method to fetch details of all subects from subject table
					foreach ($mysub AS $sub){
             ?>
             
				<tr>
					<td><?php echo $sub['w1673560_subCode']; //display subject code ?></td>
					<td><?php echo $sub['w1673560_subtitle']; //display subject title ?></td>
					<td><?php echo $sub['w1673560_subDescription']; //display subject description ?></td>
					<td><?php echo $sub['w1673560_subFee']; //display subject fee ?></td>
        </tr>
        
				<?php
					}
				?>
			</table>
			<div class="btn" style="margin-left: 40%;">
				
					<!--Login and signup buttons-->
				<button type="submit" value="Submit" style=" margin-top: 30px; "><strong> <a href="../public/login.php" 
					> Login </a> </strong></button>  or   <button type="submit" value="Submit" style=" "><strong> <a href="../public/signup.php" 
					> Sign up </a> </strong></button> to continue further
			</div>
		</div>
	</body>
</html>