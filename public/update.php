<?php
    require_once '../private/connections.php';		//initialize the web site
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Digital Tutor </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="main.css">		<!--reference to the external style sheet file-->
		<style>
			form{
			    background: white;
			    padding: 30px ;
			    margin: 25px 510px 25px 510px;
			    border: 2px solid #32bab4;
			    border-radius: 4px;
			    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            
			button{
			    width: 80px; 
			    height: 30px;
			    font-size: 15px;
			}
		</style>
	</head>
	<body>
		<button type="submit" value="Submit" style="position: fixed; right: 30px;"><strong> <a href="../public/front.php?q=logout" 
		style=" text-decoration: none; color: white;"> Logout </a> </strong></button>
		<div class="in" style="margin-top: 50px;">
			<h1 style=" letter-spacing: 3px;  color: #06159b;"> Digital Tutor </h1>
			<h2 style="text-align:center; font-family: Arial, Helvetica, sans-serif; " > <strong> Edit Subject </strong> </h2>
			<?php
				$id =$_GET['id'];			//url parameter with http get method; id of the reg/logged in tutor
				$subject = new Subject();		//an instances (object) of the Subject class
				if(isset($_POST['edit'])){		//checks if the edit is set or not, if set it would continue further
				    $w1673560_subCode = $_GET['w1673560_subCode'];		//url parameter with http get method; w1673560_subCode choosed to be edited
				    $where = array("w1673560_subCode" => $w1673560_subCode);
				        $myArray = array(		//extracting the details entered in form as an array
				            "w1673560_subCode"          => $_POST["subCode"],
				            "w1673560_subtitle"         => $_POST["subTitle"],
				            "w1673560_subDescription"   => $_POST["subDes"],
				            "w1673560_subFee"           => $_POST["subFee"]
						);
						
                  		//call to update_record method to update the subject details of the subject edited
                        if ( $subject->update_record("subject", $where, $myArray)){   
							//on successful update will be directed to the view.php with a url message "Record updated successfully"   
				             header("location:../public/view.php?id=$id&msg=Record updated successfully");
				        }
				}
			
				if(isset($_GET["update"])){		//checks if the update is set or not, if set it would continue further
				    $w1673560_subCode = $_GET['w1673560_subCode'] ?? null;
				    $where = array("w1673560_subCode" => $w1673560_subCode);
				        $row = $subject->select_record("subject", $where);	//call to select_record method 
				
            ?>
            
			<form method="POST">
				<!--subject code is in hidden to be used for further purpose but not visible-->
                <input type="hidden" name="w1673560_subCode" value="<?php echo $w1673560_subCode; ?>">
				
				<!--input field for Subject code with label-->
				<label for="subCode"> <strong> Subject Code </strong>  &nbsp</label>
				<input type="text" name="subCode" value="<?php echo $row['w1673560_subCode'] //display subject code ?>"  
				style=" width: 286px;"> <br><br>
				
				<!--input field for Subject title with label-->
				<label for="subTitle"> <strong> Subject Title </strong> &nbsp  &nbsp </label> 
				<input type="text" name="subTitle" value="<?php echo $row['w1673560_subtitle'] //display subject title ?>" 
				style=" width: 284px;"> <br><br>
				
				<!--input field for subject description with label-->
				<label for="subDes"> <strong> Subject Description </strong></label> <br>
				<textarea name="subDes" style=" width: 280px; height: 100px;"> <?php echo $row['w1673560_subDescription'] //display subject description
				?> </textarea> <br><br>
				
				<!--input field for subject fee with label-->
				<label for="fee"> <strong> Subject Fees</strong>  &nbsp  </label> 
				<input type="number" name="subFee" value="<?php echo $row['w1673560_subFee'] //display subject fee ?>"  
				style="  width: 289px;"> <br><br>
				
				<!--update button-->
				<button type="submit" id="btn" name="edit" value="update"  style="margin-left: 50px" ><strong>  Update </strong></button> 

				<!--clear button to clear all details entered in the form when required-->
				<button type="clear" id="btn"  value="clear" style="margin-left: 20px;"><strong> Clear </strong></button>
            </form>
            
			<?php
				}
			?>
		</div>
	</body>
</html>