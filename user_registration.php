<?php
session_start();
include "includes/header.html";
require "includes/db_connection.php";    //including database connection file
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
                             
                             echo "</br></br><h5>Verification email sent. Please check your inbox.</h5>";
                             echo '';
                             echo '</br></br><h5>Click on the link to verify Your email.</h5>
                                  </br></br>  <a class="alert-link" href="verify_email.php">Verify Email</a>';
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