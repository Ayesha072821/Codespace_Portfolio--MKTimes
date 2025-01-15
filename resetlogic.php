<?php
session_start();
require "includes/db_connection.php"; 
include "includes/header.html";
$email='';
if ($_SERVER["REQUEST_METHOD"] == "POST")    //if method is post
 {
    

    if(!empty($_POST['new_password']))
    {
    if($_POST['new_password'] != $_POST['confirm_new_password'])    //if both passwords dont match add to error array
    {
        $error[]="passwords do not match";
    }
    else{
        $p=mysqli_real_escape_string($link,trim($_POST['new_password']));
    }
    }
 
else{
    $error[]='Enter your Password.';  
}

if (empty($error))
{
    
    //if there are no errors make a query to check if the email provided alredy exists.
    $email=$_SESSION['email'];
    $q="UPDATE users set pass='$p' WHERE email='$email'";
    $r=@mysqli_query($link,$q);
    

    if($r)
    {
        $affected_rows=mysqli_affected_rows($link);
        if($affected_rows===0)
        {
            
            echo 'Email address do not Exist.Please try again.';
        }
        elseif($affected_rows>0)
        {

            $to_email = $email;
                         $subject = "Password change confirmation";
                         //message from user will be sent as body
                         $body = "Your password was successfully changed. You can now login using your new password." ;
                         $headers = "From: mktime.watches@gmail.com";
                        //try to send the email
                         if (mail($to_email, $subject, $body, $headers)) {
                             //if email is successfull make user aware of it
                             
                             echo "</br></br><h5 id='update'>Password Updated Sucessfully.Click the link to Log In.</h5>";
                             
                             
                                   echo'</br></br> <a class="alert-link" id="log" href="login.php">Login</a>';
                              } 
                            else{
                                $errors[]="Failed to update password";
                            }
            
        }
    }

 
}
unset($_SESSION['email']);
session_destroy();
mysqli_close($link);  //link to database is closed here
 }
?>