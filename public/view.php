<?php
	require_once '../private/connections.php';				//initialize the web site
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Digital Tutor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main.css">		<!--reference to the external style sheet file-->
		<style>

			button{
			  width: 80px; 
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
    <button type="submit" value="Submit" style="position: absolute; right: 30px;"><strong> <a href="../public/front.php?q=logout"> 
    Logout </a> </strong></button>
		<div class="in" style="margin-top: 50px;">
			<h1 style=" letter-spacing: 3px;  color: #06159b;"> Digital Tutor </h1>
      
      <?php
				$id = $_GET['id'];				//url parameter with http get method; id of the reg/logged in tutor
				$tutor = new Tutor();			//an instances (object) of the Tutor class

				//call to fetch_record method to fetch tutors details from tutor table of the tutor matching the id
				$myrow = $tutor-> fetch_record("tutor", $id);   
				  foreach ($myrow AS $row){
      ?>
      
      <h2> <strong>  Subjects taught by <?php echo $row['w1673560_firstName']; //name of the tutor ?> </strong> </h2>
      
			<?php
				}
      ?>
      
			<table align="center">
				<tr>
					<th>Subject Code</th>
					<th>Subject title</th>
					<th>Subject Description</th>
					<th>Subject Fee</th>
					<th colspan=2> &nbsp; </th>
        </tr>
        
				<?php 
					$subject = new Subject();			//an instances (object) of the Subject class
					if (isset($_GET['delete'])){		//checks if the delecte is set or not, if set it would continue further
					  $w1673560_subCode = $_GET['w1673560_subCode'] ?? null;
					  $where = array("w1673560_subCode" => $w1673560_subCode);
					    if ($subject->delete_record("subject", $where)){    //call to delete_record method to delete a subject record from subject table
								//on successful deletion will be directed to the current page (view.php) with a url message "Record deleted successfully"
								header("location:../public/view.php?id=$id&msg=Record deleted successfully");
					    }
					}
					
					//call to fetch_record method to fetch subject details from subject table of the subject matching the id
					$mysub= $subject-> fetch_record("subject", $id);		
					foreach ($mysub AS $sub){
             ?>
             
				  <tr>
					  <td><?php echo $sub['w1673560_subCode']; //displays subject code ?></td>
					  <td><?php echo $sub['w1673560_subtitle']; //displays the subject title ?></td>
					  <td><?php echo $sub['w1673560_subDescription']; //displays the subject description ?></td>
            <td><?php echo $sub['w1673560_subFee']; //displays the subject fee ?></td>
						
						<!--edit button with hyperlink to update.php when triggered-->
            <td> <button> <a href="update.php?id=<?php echo $id?>&update=1&w1673560_subCode=<?php echo $sub['w1673560_subCode']; ?>">  
            Edit </a> </button> </td>

						<!--edit button with hyperlink to view.php (same page with an update of record being deleted) when triggered-->
            <td> <button> <a href="view.php?id=<?php echo $id?>&delete=1&w1673560_subCode=<?php echo $sub['w1673560_subCode']; ?>" > 
            Delete  </a> </button> </td>
				  </tr>
				<?php
					}
				?>
			</table>

			<!--add more link to add more subjects to heir relevant accounts, when clicked, will be redirected to addSub.php-->
			<p style="margin-left: 40%;"> Want to add more subjects?  <a href="../public/addSub.php?id=<?php echo $id; ?>" 
			style=" color: red; text-decoration: underline;"> Add more Subject </a>  </p>
		</div>
	</body>
</html>