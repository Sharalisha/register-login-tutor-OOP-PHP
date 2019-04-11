<?php
    session_start();        //sstart of session
    require_once '../private/connections.php';      //initialize the web site

    $subject = new Subject();       //an instances (object) of the subject class
    $id = $_GET['id'];              //url parameter with http get method; id of the reg/logged in tutor
    if (isset($_POST['submit'])){      //gets triggered if submit is clicked 
        for ($num = 0; $num < sizeof($_POST['subCode']); $num += 1) {       //foreach loop to add multiple subjects taught to the subject table
            $resultSet = $subject->reg_subject(         //call to subject registration method
                $_POST['subCode'][$num],
                $_POST['subTitle'][$num],
                $_POST['subDes'][$num],
                $_POST['subFee'][$num],
                $id
            );
        }

        if ($resultSet) {  
            //if the subjects were successfuly added, will be directed to details page passed with the id of the registered tutor
            header("location:../public/details.php?id=$id");
        } else {
            //subjects Failed to be added, "registration failed msg" will be printed
            echo 'Registration failed.';
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Digital Tutor </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css">      <!--reference to the external style sheet file-->
    
        <script>
            $(document).ready(function(e){
            //variable 
            var html1 =' <p/> <div> <a href="#" id="remove1" style="color:red;"> -REMOVE </a> <br>  <label for="subCode"> <strong> Subject Code </strong>  &nbsp</label><input type="text" name="subCode[]" id="childsubCode" required="" style=" width: 286px; " ><br><br> <label for="subTitle"> <strong> Subject Title </strong> &nbsp  &nbsp </label> <input type="text" name="subTitle[]" id="childsubTitle" required="" style=" width: 284px; "><br><br> <label for="subDes"> <strong> Subject Description </strong></label> <br> <textarea name="subDes[]"   id="childsubDes" required="" style=" width: 400px; height: 100px;"></textarea><br><br>  <label for="fee"> <strong> Subject Fees</strong>  &nbsp  </label> <input type="number" name="subFee[]" id="childsubFee" required="" style="  width: 289px;  " > <br><br></div>';

            //add more rows
                $("#add1").click(function(e){
                    $("#container1").append(html1);
                });

            //remove rows
                $("#container1").on('click','#remove1',function(e){
                    $(this).parent('div').remove();
                }); 
            });

        </script>

    <style>

        form{
            padding: 9px 24px 30px 21px;
            margin: 15px  455px 10px  450px;
        }

        input, select,textarea {
            width: 410px; 
            height: 25px; 
        }

        button{
            width: 150px; 
            height: 45px;
            font-size: 18px;
            margin-top: 20px;
        }

    </style>
    </head>
<body>
    <a href="details.php?id=<?php echo $id; ?>"> <button type="skip" value="skip" style="position: absolute; right: 30px;"><strong> 
	Skip Page  </strong></button> </a>
	<div class="in">

		<h1 style=" letter-spacing: 3px;  color: #06159b;"> Digital Tutor </h1>
        <h1 style=" font-size: 18px;"> Please fill in the below to complete Sign up... </h1>
        
        <!-- a form to add subjects with http post method to pass the information entered. when submit is clicked action is triggered-->
        <form autocomplete="off" method="POST" action="addSub.php?id=<?php echo $id?>">
        
			<h2 > <strong> Subjects Taught </strong> </h2>
			<div id="container1">
                 <!--link to add more of subCode, SubTitle, description, fees-->
                <a href="#" id="add1" style="color:red"> +ADD MORE </a> <br>  <br>     
                
                 <!--input field for subject code with label-->
				<label for="subCode"> <strong> Subject Code </strong>  &nbsp</label>
				<input type="text" name="subCode[]" id="subCode"  required="" style=" width: 286px; " >
                <br><br>
                
                <!--input field for subject title with label-->
				<label for="subTitle"> <strong> Subject Title </strong> &nbsp  &nbsp </label> 
				<input type="text" name="subTitle[]" id="subTitle" required="" style=" width: 284px; ">
                <br><br>
                
                <!--input field for subject description with label-->
				<label for="subDes"> <strong> Subject Description </strong></label> <br>
				<textarea name="subDes[]"   id="subDes" required="" style=" width: 400px; height: 100px;"></textarea>
                <br><br>
                
                <!--input field for subject fees with label-->
				<label for="fee"> <strong> Subject Fees</strong>  &nbsp  </label> 
				<input type="number" name="subFee[]" required="" id="subFee" style="  width: 289px;  " >
				<br><br>
            </div>
            
            <!--submit button to submit the details entered in the form-->
            <button type="submit" name="submit" value="Register"  style="margin-left: 50px" ><strong>  Submit </strong></button>

            <!--clear button to clear all details entered in the form when required-->
			<button type="clear" value="clear" style="margin-left: 20px;"><strong> 
            Clear </strong></button>
            
		</form>
	</div>
</body>
</html>