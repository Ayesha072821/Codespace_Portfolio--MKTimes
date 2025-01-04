<?php
//strating the seesion
session_start();
//including header file to display navigation bar and to databse connection
include "header.html";
require "db_connection.php";



//seeing if session variable is set or not. if user have signed in it will be set
if(isset($_SESSION['userid']))
{
    
    
   //if user have signed in some changes are done in navigation bar
   //instead of login, logout  is shown and refernce of that element is changed to logout page
  // element to register is made invisible to the user when already signed in
  
       
   // a welcome message is printed with the name of user stored in session variable
   include "change_references.php";



   
}

?>
<!--  this html display the form which will get message from use and it should not be empty-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
       <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
    </head>
    <body>
        <h3 style="text-align:center;">MK TIME</h3>
        <hr>
        <p style="font-size:1.2rem; text-align:center;"><i> We are just a Message away .Once we recieve your message Our customer Services will be in contact with you on your registered email.</i></p></br></br>
       
        <form method="POST" action="contactform.php">
        <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/contact.jpg" width=100% height=300px>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5" style="border: 1px solid black;">
                        <h5>Contact US!</h5>

                        
    

                        <label for="message">Message:</label>
                        <textarea type="text" id="message" class="form-control" name="message" required=""></textarea>

</br>
</br>

                        <button type="submit">Send Message</button>


                        <?php 
                    //if there are any errors they will be displayed here
                        if (!empty($errors)) {
                            echo implode("<br>", $errors); 
                        }
                    ?>
                    </div>
                </div>
        </div>
</form>
    </body>
</b></br>
</br>
</html>
<?php
//if session variable is set then the attribute will be changed so when user wants to view the collection it dont take the user to signin page
if(isset($_SESSION['userid']))
{


    


        if ($_SERVER['REQUEST_METHOD']==='POST')
{
    $errors=array();   //initialize any array for errors

    if(empty($_POST['message']))
    {
        $errors[]='Enter your message.';   //message should not be empty
    }
    else{
        if (empty($errors))    //if there are no errors make a query to get users email address using user id stored in session.
            {
                $id=$_SESSION['userid'];     //store value of session variable in another variable
                $q="SELECT email from users WHERE user_id='$id'";    //query to retrieve user email
                $r=@mysqli_query($link,$q);     //execute the query
                if(mysqli_num_rows($r) !=0)     // if any row is retrieved
                    {
                        $result=mysqli_fetch_array($r,MYSQLI_ASSOC);
                        // in this case an email is sent to mktimes account with subject as user email
                        $to_email = "mktime.watches@gmail.com";
                        $subject = $result['email'];
                        //message from user will be sent as body
                        $body = $_POST['message'];
                        $headers = "From: ".  $subject;
                       //try to send the email
                        if (mail($to_email, $subject, $body, $headers)) {
                            //if email is successfull make user aware of it
                            echo "</br><h5>Our customer services have recieved your message. Our agent will contact you back on Registered Email.</br></br></h5>";
                        } else {
                            // if not successful print an error message.
                          echo "<h5>Message sending failed. Try Again</h5>";
                        }
                       
                    }
            }
        }
    


}
 

}
include "footer.html";
?>