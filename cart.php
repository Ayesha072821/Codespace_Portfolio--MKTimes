<?php
session_start();                         //starting session
include "includes/header.html";                  //including header for navigation within website
require "includes/db_connection.php";           //database connection file
//seeing if session variable is set or not. if user have signed in it will be set
if(isset($_SESSION['userid']))
{
    
   //if user have signed in some changes are done in navigation bar
   //instead of login, logout  is shown and refernce of that element is changed to logout page
  // element to register is made invisible to the user when already signed in
  include "includes/change_references.php";


   //check if the cart variable have nothing in it
if(empty($_SESSION['cart']))
{
    echo '<h2>There are no items in cart.</h2>';      //show user that there is nothing in cart

}


//if session cart is not empty then create a query to get data agains all the item_id's from database
else{
                                           
    $q="SELECT * FROM products WHERE item_id IN (";
     foreach ($_SESSION['cart'] as $id =>$value){
    $q.=$id . ',';}
     $q=substr($q,0,-1).') ORDER BY item_id ASC';

     $r=mysqli_query($link,$q);         //execute the query


     
     
    

     }
    }
    
    

    
?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>MKTimes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 200px;
            height:1500px
            box-sizing: border-box;
        }
        .card-image{
            width:100%;
            height:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>

</br>
    </br>
    </br>
   
    <?php
        
        if(isset($_SESSION['userid']) and ($_SESSION['cartitems']>0))
        {
        echo '<form id="cartchanges" action="updatecart.php" method="POST"></br></br>';   //this is the form if user wants to update the cart
               
        echo '<button class="btn btn-dark"type="submit" style="float:center;">Update Cart</button></br></br></br>';    //when user changes the products quantity this button us clicked to update cart.
        //this cart button goes to the update cart file and do some work there to update the cart.



       while ($row =mysqli_fetch_array ($r, MYSQLI_ASSOC))         //for every row of data from database
       {
           
           
           //this is the styling to show items in cart to the user using all information from database
           //it also give option to change quantity of items
           //user can remove items when remove button is pressed get request goes to the delete from cart file and does stuff there to remove item from there.           
                   echo '<div class="row" style="border:2px solid black;">     
             
               <div class="col-sm-2 d-flex justify-content-center align-items-center" >
                   
                   <img  style="width:100px; height:100px;"  src='. $row['item_img'].'  alt=""></div>
                   <div class="col-sm-2 d-flex justify-content-center align-items-center">
                   
                   <h5><i>'. $row['item_name'].'</i> </h5></div>
                   <div class="col-sm-2 d-flex justify-content-center align-items-center">
                   
                   <input type="number" name="quantity['.$row['item_id'].']"id="quantity" min="1" max="20" value='.$_SESSION['cart'][$row['item_id']]['quantity'].'></div>

                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                   
                   <h5> <i class="text-primary"> '. $_SESSION['item_price'][$row['item_id']]['price'].' </i></h5></div>

                   
                       <div class="col-sm-2 d-flex justify-content-center align-items-center">
                   
                   <a class="btn btn-dark "  href="deletefromcart.php?id='.$row['item_id'].'">Remove Item(s)</a></div>

                    </div></br>';
           }

        

           
           

           echo '</form>';


           echo '<h4 style="float:right; border:3px solid black;">Subtotal : '.$_SESSION['subtotal'].'</h4></br></br>';
           
           echo '<a class="btn btn-dark"type="submit" style="float:right;" href="checkout.php">Check Out';
           
        }
        
    ?>
    
</body>
</html>

<?php

# Close database connection.
mysqli_close( $link) ; 


?>











