<?php
session_start();  //starting the session
if(isset($_SESSION['userid']))   //see if user have signed in
{
   
    //change all the buttons back to when user is not signed uin
    
        echo '<script>
        const change=document.getElementById("signin/out");
        change.setAttribute("href","login.php");
        change.innerHTML="Sign IN";
        const def=document.getElementById("register");
        def.setAttribute("href","registration.php");
        def.innerHTML="Register";
        document.getElementById("welcome").innerHTML="";

        </script>';
    
     $_SESSION = array();       //destroying the session when user log out
     session_unset();
    session_destroy();
    header('Location:index.php');   //after logout go to index page
    exit();

}

?>
