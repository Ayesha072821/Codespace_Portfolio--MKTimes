<?php
//strating the seesion
session_start();
//including header file to display navigation bar and to databse connection
include "includes/header.html";
require "includes/db_connection.php";
//seeing if session variable is set or not. if user have signed in it will be set
if(isset($_SESSION['userid']))
{
    
   //if user have signed in some changes are done in navigation bar
   //instead of login, logout  is shown and refernce of that element is changed to logout page
  // element to register is made invisible to the user when already signed in
  
       
    
include "includes/change_references.php";

}

?>
<!--  this html display two cards with the collections for women and men.
  if user is not signed in it will redirect to sign in page.
  it will display all items when user sign in -->
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
 
    </head>
    <body>
        <h3 style="text-align:center;">MK TIME</h3>
        <hr>
        <p style="font-size:1.2rem; text-align:center;"><i> A great choice of timepiece says much about being classic.</i></p></br></br>
        <div class= "container">


            <div class="row">
            <div class="col-sm-1"></div>
                <div class="col-sm-4">
                    <div class="card  text-center  ">
                    <h5 class="FOR HER">FOR HER</h5>
                        <img src="img/forher.jpg" class="card-img-top" alt="..."  style=" height:200px; ">
                        <div class="card-body">
                            
	                        <a id="her" href="login.php" >Sign IN to View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
  
                <div class="col-sm-4">
                    <div class="card text-center" >
                    <h5 class="card-title">FOR HIM</h5>
                        <img src="img/forhim.jpg" class="card-img-top" alt="..." style=" height:200px; " >
                        <div class="card-body">
                            
	                        <a id="him" href="login.php" >Sign IN to view</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</b></br>
</br>
</html>
<?php

if(isset($_SESSION['userid']))
{
echo '<script>
const forher=document.getElementById("her");
forher.setAttribute("href","femalecollection.php");
forher.innerHTML="View Female Collection";

const forhim=document.getElementById("him");
forhim.setAttribute("href","malecollection.php");
forhim.innerHTML="View Male Collection";




</script>';
}

include "includes/footer.html";
?>