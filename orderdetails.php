<?php
session_start();
include "header.html";
require "db_connection.php";

if(isset($_SESSION['userid']))
{
    
   //if user have signed in some changes are done in navigation bar
   //instead of login, logout  is shown and refernce of that element is changed to logout page
  // element to register is made invisible to the user when already signed in
  
  include "change_references.php";
    

   



//Assuming you have the item_id available (e.g., from a button or link)
$order_id = $_GET['id']; // You can use a POST or GET parameter to get the item ID
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
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
        
        if(isset($_SESSION['userid']))
        {
            $q = "select products.item_img,products.item_name,order_contents.quantity,order_contents.price from order_contents right join products on order_contents.item_id=products.item_id where order_contents.order_id=".$order_id."";
	        $r = mysqli_query( $link, $q ) ;
       

            if ( mysqli_num_rows( $r ) > 0 )
	        {


                


		        while($row=$r->fetch_assoc())
		        {


                    
                //for every row of data from database
       
           
           
                    //this is the styling to show items in cart to the user using all information from database
                    //it also give option to change quantity of items
                    //user can remove items when remove button is pressed get request goes to the delete from cart file and does stuff there to remove item from there.           
                    echo '<div class="row" >     
             
                    <div class="col-sm-3  justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <img  class="img-fluid" style="width:100px; height:100px;"  src='. $row['item_img'].'  alt=""></div>
                        
                        
                        <div class="col-sm-3  justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <h5><i>'. $row['item_name'].'</i> </h5></div>
                      
                        
                        <div class="col-sm-3 d-flex justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <h5><i>'. $row['quantity'].'</i> </h5></div>
                      
                         <div class="col-sm-3 d-flex justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <h5> <i> '. $row['price'].' </i></h5></div>
     
                    </div></br></br>';     

			        
		        }
            }


	
	        else
	        {
	            echo 'NO Orders to display';
	        }
        }
           

        

           
           

           


           
        
        
    ?>
    
</body>
</html>

<?php

# Close database connection.
mysqli_close( $link) ; 


?>