<?php
//start the session
session_start();

//connection with database
include "header.html";  //here the header file is included  here which will show the navbar
require "db_connection.php";

// after form submisiion check if method is post
if ($_SERVER['REQUEST_METHOD']==='POST')
{
    $errors=array();   //initialize any array for errors

    if(empty($_POST['user_email']))
    {
        $errors[]='Enter your email.';   //email should not be empty
    }
    else{
        $e=mysqli_real_escape_string($link,trim($_POST['user_email']));    
    }
    
    if (empty($errors))    //if there are no errors make a quesr with the input from user
    {
        $q="SELECT user_id from users WHERE email='$e'";
        $r=@mysqli_query($link,$q);     //execute the query
        if(mysqli_num_rows($r) !=0)     // if any row is retrieved
        {
            $result=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $to_email = $e;
            $encoded_email=base64_encode($e);
            $subject = "Password Reset Link";
            //message from user will be sent as body
            $body = "http://localhost/finalprojectbootcamp/resetpassword.php?email=". urlencode($encoded_email);
            $headers = "From: mktime.watches@gmail.com";
            //try to send the email
            if (mail($to_email, $subject, $body, $headers)) {
            //if email is successfull make user aware of it
                             
            echo "<h5>Link To reset password has been sent to you email. Click that to change your password. </h5>";
            echo '';
            echo '<h5>Go back to log in .</h5>
            <a class="alert-link" href="login.php">LOGIN Page</a>';
                    } 
            else{
            $errors[]="Failed to send verification email";
                }
            
        }
        else{
            $errors[]='Email address do not exist';   //if user enterd wrong email address
            
        }
    }
    
    mysqli_close($link);  //link to database is closed here

}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SIGN IN</title>
        <!-- Bootstrap CSS -->
       <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
       <style>
        
        .error { color: red; }
    

       </style>
        
		
        
    </head>
    <body></br></br></br>
                
        <form id="registrationform" action="forgotpassword.php" method="POST" >
            <div class="container">
                <div class="row">
                    
                    
                    <div class="col-md-6" style="border: 1px solid black;">
                        <h5>LOG IN!</h5>
                        <!-- input box for email -->
	 			        <label for="email">Email Address:</label>
	 			        <input type="email" id="user_email" class="form-control" name="user_email" required=""></br>

                        

                        
                        <!-- submit button -->
                         <div>
     			        <input type="submit"  class="btn btn-dark">
                         
</div>
                         <p class="error">
                    <?php 
                    //if there are any errors they will be displayed here
                        if (!empty($errors)) {
                            echo implode("<br>", $errors); 
                        }
                    ?>
                </p>
                    </div>
                </div>
            </div></br></br>
        </form>
       
        
    </body>

</html>

