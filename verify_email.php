<?php
session_start();
include "header.html";   //including the header file to display navbar for navigation
require "db_connection.php"; 
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['email_verification_code']))
{
    $user_input=$_POST['verify_email'];
    if($user_input==$_SESSION['email_verification_code'])
    {
        
        $user_data=$_SESSION['user_data'];

        $fn=$user_data['fn'];
        $ln=$user_data['ln'];
        $db=$user_data['db'];
        $p=$user_data['p'];
        $e=$user_data['e'];
         

        


       // $q = "INSERT INTO users (first_name, last_name, date_of_birth, email, pass, reg_date) VALUES ('{$user_data['fn']}', '{$user_data['ln']}', '{$user_data['db']}', '{$user_data['e']}', '" . password_hash($user_data['p'], PASSWORD_DEFAULT) . "', NOW())";
       $q="INSERT INTO users(first_name,last_name,email,pass,reg_date) VALUES ('$fn','$ln','$e','$p',NOW())";
        $r = @mysqli_query($link, $q);

        if ($r) {
            echo "<h5>Verification complete. You are now registered!</h5>";
            echo '<a class="alert-link" href="login.php">LOG IN</a>';
            unset($_SESSION['email_verification_code']);
            unset($_SESSION['user_data']);
            session_destroy();
            }
            
        } 
        else {
            echo "Error registering user. Please try again.";
        }


        
} 
else if(!isset($_SESSION['email_verification_code'])){
    echo "<h5>Try to LOG IN, if you've already verified your email.</h5>";
            echo '<a class="alert-link" href="login.php">LOG IN</a>';

}
    

    

mysqli_close($link);  //link to database is closed here

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
<form id="emailverification" action="verify_email.php" method="POST" >
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-5" style="border: 1px solid black;">
                        <h5>Verify Email</h5>
</br>
                        <!-- input box for email -->
	 			        <label for="verify">Verification Code:</label>
	 			        <input type="text" id="verify_email" class="form-control" name="verify_email" required=""></br>

                        
                        
                        <!-- submit button -->
     			        <input type="submit"  class="btn btn-dark"></br></br>

                         <p class="error">
                    <?php 
                    //if there are any errors they will be displayed here
                        if (!empty($errors)) {
                            echo implode("<br>", $errors); 
                        }
                    ?>
                </p>
</form>


</body>

</html>

