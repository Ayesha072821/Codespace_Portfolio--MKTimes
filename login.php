<?php
//start the session
session_start();

//connection with database
require "includes/db_connection.php";

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
    

    if(empty($_POST['user_password']))
    {
        $errors[]='Enter your Password.';   //password should not be empty
    }
    else{
        $p=mysqli_real_escape_string($link,trim($_POST['user_password']));
    }
    if (empty($errors))    //if there are no errors make a quesr with the input from user
    {
        $q="SELECT user_id,first_name from users WHERE email='$e'and pass='$p'";
        $r=@mysqli_query($link,$q);     //execute the query
        if(mysqli_num_rows($r) !=0)     // if any row is retrieved
        {
            $result=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $_SESSION['userid']=$result["user_id"];    //user id stored in session 

            $_SESSION['userfirstname']=$result["first_name"];   //user name is also stored in session

            $_SESSION['cartitems']=0;      //cart items are initialized. this will keep track of total number of items added

            $_SESSION['subtotal']=0;      //initializing this session variable to store the total of all items.

            if(!isset($_SESSION['cart']))
            {
                $_SESSION['cart']=array();  // if session cart is not already initialized it is initialized here
                $_SESSION['item_price']=array();  // session variable to store price of each item against item id  
            }
          //  header_remove();                 // i added this here because i was getting header error but then i moved the htm output after header so it was solved
            header('Location:index.php');
            exit();
        }
        else{
            $errors[]='Wrong Credentials. Please try again';   //if no user details are not correct it is stored in error array
            
        }
    }
    
    mysqli_close($link);  //link to database is closed here

}
include "includes/header.html";  //here the header file is included  here which will show the navbar

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
                
        <form id="loginform" action="login.php" method="POST" >
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/login.jpg" width=100% height=300px>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5" style="border: 1px solid black;">
                        <h5>LOG IN!</h5>
                        <!-- input box for email -->
	 			        <label for="email">Email Address:</label>
	 			        <input type="email" id="user_email" class="form-control" name="user_email" required=""></br>

                        <!-- input box for password -->
                        <label for="password">Password:</label>
                        <input type="password" id="user_password" class="form-control" name="user_password" required=""></br>

                        
                        <!-- submit button -->
                         <div>
     			        <input type="submit" id="log_in" class="btn btn-dark">
                         <a class="alert-link" id="forgot_password" href="forgotpassword.php" style="float:right">Forgot Password</a>
</div>
                         <p class="error" id='login_err'>
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

<?php
include "includes/footer.html"     //here footer file is included
?>