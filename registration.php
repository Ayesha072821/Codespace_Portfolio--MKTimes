<?php
session_start();
include "header.html";   //including the header file to display navbar for navigation
require "db_connection.php";    //including database connection file
if ($_SERVER["REQUEST_METHOD"] == "POST")    //if method is post
 {
    

    $errors=array();   //initialize the array to store errors

if(empty($_POST['firstname']))
{
    $errors[]='Enter your First name.';    //store in error array is name field is empty
}
else{
    $fn=mysqli_real_escape_string($link,trim($_POST['firstname']));
}

if(empty($_POST['lastname']))
{
    $errors[]='Enter your last name.';    //store in error array if lastname field is empty
}
else{
    $ln=mysqli_real_escape_string($link,trim($_POST['lastname']));
}


if(empty($_POST['dateofbirth']))
{
    $errors[]='Enter your Date Of Birth.';    //date of birth field must not be empty
}
else{
    $db=mysqli_real_escape_string($link,trim($_POST['dateofbirth']));
}



if(empty($_POST['email']))
{
    $errors[]='Enter your Email.';    //email field must not be emptu otherwise store in error array
}
else{
    $e=mysqli_real_escape_string($link,trim($_POST['email']));
}

if(!empty($_POST['password']))
{
    if($_POST['password'] != $_POST['confirmpassword'])    //if both passwords dont match add to error array
    {
        $errors[]="passwords do not match";
    }
    else{
        $p=mysqli_real_escape_string($link,trim($_POST['password']));
    }
}
else{
    $errors[]='Enter your Password.';  
}




if (empty($errors))
{
    //if there are no errors make a query to check if the email provided alredy exists.
    $q="SELECT user_id from users WHERE email='$e'";
    $r=@mysqli_query($link,$q);
    if(mysqli_num_rows($r) !=0)
    {
        $errors[]="Email address already registerd";  //save in error array that user already exists.
    }
    else{
        //if user not already exists then add all information to database.

        //generate random number to send to user email to verify email.
            $random = rand(1000, 100000);
            
            $_SESSION['email_verification_code'] = $random;
            $_SESSION['user_data'] = compact('fn', 'ln', 'db', 'e', 'p');


                         $to_email = $e;
                         $subject = "Email Verification code";
                         //message from user will be sent as body
                         $body = "Thanks for Registring with us. Here is your Verification Code. " . $random;
                         $headers = "From: mktime.watches@gmail.com";
                        //try to send the email
                         if (mail($to_email, $subject, $body, $headers)) {
                             //if email is successfull make user aware of it
                             
                             echo "<h5>Verification email sent. Please check your inbox.</h5>";
                             echo '';
                             echo '<h5>YClick on the link to verify Your email.</h5>
                                    <a class="alert-link" href="verify_email.php">Verify Email</a>';
                              } 
                            else{
                                $errors[]="Failed to send verification email";
                            }


                        

        

        //$q="INSERT INTO users(first_name,last_name,email,pass,reg_date) VALUES ('$fn','$ln','$e','$p',NOW())";
        //$r=@mysqli_query($link,$q);
        //if($r)
        //{
            //echo '<h5>Your are now registerd.</h5>
            //<a class="alert-link" href="login.php">LOG IN</a>';
        //}
    }
}
if(!empty($errors))
{
    echo '<h4 class="alert-heading" id="err_msg">The Following error(s) occurred.</h4>';
    foreach($errors as $msg)
    {
        echo "-$msg<br>";
    }
    echo '<p>Please Try Again.</p>';

}


mysqli_close($link);
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registration Form</title>
        <!-- Bootstrap CSS -->
       <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
       <style>
        
        .error { color: red; }
        
        
    
    

       </style>
        
		
        
    </head>

    <body ></br></br></br>
        <form id="registrationform" action="registration.php" method="POST" >
            
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/cover1.jpg" width=100% height=550x>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5" style="border: 1px solid black;">
                        <h5>Register Yourself!</h5>

                        <!-- input box for user first name --> 
                        <label for="firstname"> First Name:</label>
                        <input type="text" id="firstname"  class="form-control" name="firstname" required=""></br>

                        <!-- input box for user last name--> 
                        <label for="lastname"> Last Name:</label>
                        <input type="text" id="lastname"  class="form-control" name="lastname" required=""></br>
                        
                        <!-- input box for user date of birth -->  
	  			        <label for="dateofbirth">Date of Birth:</label>
	  			        <input id="dateofbirth" 	class="form-control" type="date" name="dateofbirth" required=""> </input>

                        <!-- input box for user email address -->
	 			        <label for="email">Email Address:</label>
	 			        <input type="email" id="email" class="form-control" name="email" required=""></br>


                        <!-- input box for password --> 

                        <label for="password">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" required=""></br>

                        <!-- input box for confirm password--> 

                        <label for="confirmpassword">Confirm Password:</label>
	 			        <input type="password" id="confirmpassword" class="form-control" name="confirmpassword" required=""></br>

                        <!-- submit button -->
     			        <input type="submit"  class="btn btn-dark"></br></br>
                         <p id="error" class="error"></p>
                    </div>
                </div>
            </div></br></br>
        </form>
        

        <script>
            //this script do some basic checks
            //const check=document.getElementById("item-count");
            //check.innerHTML=1;
            document.getElementById('registrationform').addEventListener('submit',function(event)
            {
                const pass=document.getElementById('password').value;
                const confirmpass=document.getElementById('confirmpassword').value;
                const errormessage=document.getElementById('error');
                var birthdate = new Date(document.getElementById("dateofbirth").value);
                var today = new Date();

    // Calculate the age
                var age = today.getFullYear() - birthdate.getFullYear();
                var monthDifference = today.getMonth() - birthdate.getMonth();

    // Adjust age if the birthdate hasn't occurred yet this year
                if ((monthDifference < 0 || ( monthDifference === 0)  && (today.getDate() < birthdate.getDate())))
                {
                    age--;
                }

    // Check if the age is less than 16
                if (age < 16) 
                {
                    event.preventDefault()

                    errormessage.textContent="You should be 16 and older to register yourself";
                    return;
                } 
                


                if(pass !== confirmpass)
                {
                    event.preventDefault()
                    errormessage.textContent='Passwords do not match';
                    return;

                }
//password must be more than 8 varchars
				if(pass.length<8)
                {
                    event.preventDefault()
                    errormessage.textContent='Password should be more then 8 characters long';
                    return;

                }
                errormessage.textContent = '';

            });
        </script>
        
    </body>

</html>
<?php

include "footer.html";

?>
