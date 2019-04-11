<?php
  session_start();
  require_once '../private/connections.php';		//initialize the web site

  $tutor = new Tutor();				//an instances (object) of the Tutor class
  $subject = new Subject();		//an instances (object) of the subject class

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Digital Tutor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main.css">		<!--reference to the external style sheet file-->
		<style>

			table{
			  padding: 30px ;
			  border: 2px solid #32bab4;
			  border-radius: 4px;
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			  font-size: 17px;
      }
      
			button{
			  width: 100px; 
			  height: 30px;
			  font-size: 15px;
      }
      
		</style>
	</head>
	<body>
		<!--logout button with hyperlink to front.php when triggered, redirects the tutors to the home/ index page-->
		<button type="submit" value="Submit" style="position: absolute; right: 30px;">
		<strong> <a href="../public/front.php?q=logout" style=" text-decoration: none; color: white;"> Logout </a> </strong></button>
		<div class="in" style="margin-top: 35px;">
			<h1 style=" letter-spacing: 3px;  color: #06159b;"> Digital Tutor </h1>
			<h2> <strong> Your Details Page </strong> </h2>
			<?php
				$id = $_GET['id'];		//url parameter with http get method; id of the reg/logged in tutor

				//call to fetch_record method to fetch tutors details from tutor table of the tutor matching the id
				$myrow = $tutor->fetch_record("tutor", $id);	
				foreach($myrow AS $row) {
        ?>
        
			<table cellpadding=9; align='center'>
				<tr>
					<td><strong> *Full Name: </strong></td>
					<td> <?php
						echo $row['w1673560_firstName'];		//display tutor full name
						?> </td>
        </tr>
        
				<tr>
					<td> <strong> *Username: </strong></td>
					<td><?php
						echo $row['w1673560_username'];		//display tutor username
						?></td>
        </tr>
        
				<tr>
					<td> <strong> *Password: </strong></td>
					<td><?php
						echo $row['w1673560_password'];		//display tutor password
						?></td>
        </tr>
        
				<tr>
					<td> <strong> *Date of Birth: </strong></td>
					<td><?php
						echo $row['w1673560_dob'];			//display tutor date of birth
						?></td>
        </tr>
        
				<tr>
					<td> <strong> *Contact No: </strong></td>
					<td><?php
						echo $row['w1673560_contactNo'];			//display tutor contact no
						?></td>
        </tr>
        
				<tr>
					<td> <strong> *E-Mail: </strong></td>
					<td><?php
						echo $row['w1673560_email'];				//display tutor email
						?></td>
        </tr>
        
				<tr>
					<td> <strong> *Qualification: </strong></td>
					<td><?php
						echo $row['w1673560_qualification'];		//display tutor Qualification
						?></td>
        </tr>
        
				<?php
				$mysub = $subject->fetch_record("subject", $id);
				if (sizeof($mysub) == 0){
					?>
						<tr>
							<td>  <button type="submit" value="add" style="margin-left: 15px;"> <strong> 
							<a href="addSub.php?id=<?php
								echo $id; ?>" style=" text-decoration: none; color: red;">  Add subject </a> </strong></button>  
							</td>
						</tr>

				<?php
				} else{
					?>
						<tr>
					<td> <strong> *Subjects taught: </strong></td>

					<!--view button with hyperlink to view.php when triggered the tutors will be able
					 to see the subjects taught by them in details-->
					<td>  <button type="submit" value="view" style="margin-left: 15px;"> <strong> 
						<a href="view.php?id=<?php
							echo $id; ?>" style=" text-decoration: none; color: red;">  View </a> </strong></button>  

					</td>
        </tr>
        
				<?php
					//call to fetch_record method to fetch subject from subject table of the subject matching the id	
					foreach($mysub AS $sub) {
        ?>

				<tr>
					<td > <?php
						echo $sub['w1673560_subtitle'];  //display title of subject
						?>  </td>
        </tr>
					 <?php
				}
			}
				?>
        
			</table>
			<?php
				}
			?>
		</div>
	</body>
</html>