<?php
session_start();
include "includes/header.html";   //including the header file to display navbar for navigation
require "includes/db_connection.php"; 
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
            echo "</br></br><h5>Verification complete. You are now registered!</h5>";
            echo '</br></br><a class="alert-link" href="login.php">LOG IN</a>';
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
    echo "</br></br><h5>Try to LOG IN, if you've already verified your email.</h5>";
    echo '</br></br><a class="alert-link" href="login.php">LOG IN </a>';
       

}
    

    

mysqli_close($link);  //link to database is closed here

?>