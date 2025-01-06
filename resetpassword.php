<?php
session_start();
include "includes/header.html";   //including the header file to display navbar for navigation
require "includes/db_connection.php";    //including database connection file
$_SESSION['email']='';
$error=array();

if(isset($_GET['email']))
{

    //getting the encoded email
    $encoded_email=$_GET['email'];


    //decode the email

    $email=base64_decode($encoded_email);
    $_SESSION['email']=$email;



}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MKTimes</title>
        <!-- Bootstrap CSS -->
       <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
       <style>
        
        .error { color: red; }
    

       </style>
        
		
        
    </head>
    <body></br></br></br>
                
        <form id="resetpassword" action="resetlogic.php" method="POST" >
            <div class="container">
                <div class="row">
                    
                    
                    <div class="col-md-6" style="border: 1px solid black;">
                        <h5>Reset Password!</h5>
                        <!-- input box for email -->
	 			        <label for="newpassword">New Password:</label>
	 			        <input type="password" id="new_password" class="form-control" name="new_password" required=""></br>

                         <label for="confirmpassword">Confirm New Password:</label>
	 			        <input type="password" id="confirm_new_password" class="form-control" name="confirm_new_password" required=""></br>

                        

                        
                        <!-- submit button -->
                         <div>
     			        <input type="submit"  class="btn btn-dark">
                         
</div>
                         <p class="error" id="error">
                    <?php 
                    //if there are any errors they will be displayed here
                        if (!empty($error)) {
                            echo implode("<br>", $error); 
                        }
                    ?>
                </p>
                    </div>
                </div>
            </div></br></br>
        </form>
       




<script>

        document.getElementById('resetpassword').addEventListener('submit',function(event)
            {
                const pass=document.getElementById('new_password').value;
                const confirmpass=document.getElementById('confirm_new_password').value;
                const errormessage=document.getElementById('error');
            



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