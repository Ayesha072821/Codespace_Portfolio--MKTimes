<?php
session_start();
include "includes/header.html";   //including the header file to display navbar for navigation
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
        <form id="registrationform" action="user_registration.php" method="POST" >
            
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
     			        <input type="submit"  id="register" class="btn btn-dark"></br></br>
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

                    errormessage.innerHTML="You should be 16 and older to register yourself";
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

include "includes/footer.html";

?>
