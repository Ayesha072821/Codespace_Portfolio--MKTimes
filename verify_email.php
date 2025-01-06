<?php
session_start();
include "includes/header.html";   //including the header file to display navbar for navigation
require "includes/db_connection.php"; 
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
<form id="emailverification" action="verify_email_logic.php" method="POST" >
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

