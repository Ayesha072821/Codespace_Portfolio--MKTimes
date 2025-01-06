<?php
session_start();
require "includes/db_connection.php";
include "includes/header.html";

if(isset($_SESSION['userid']))
{
    
   //if user have signed in some changes are done in navigation bar
   //instead of login, logout  is shown and refernce of that element is changed to logout page
  // element to register is made invisible to the user when already signed in
  
  include "includes/change_references.php";

   


}




?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MKTimes</title>
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
            $q = "SELECT order_id,total,order_date FROM orders where user_id=". $_SESSION['userid']."" ;
	        $r = mysqli_query( $link, $q ) ;
       

            if ( mysqli_num_rows( $r ) > 0 )
	        {


                
                       echo '<div class="card-container  d-flex justify-content-center">';
                    $counter=0;
		        while($row=$r->fetch_assoc())
		        {


                    
                    
                    
                        echo '</div><div class="card-container d-flex justify-content-center" >';
                    
                    echo '<div class="col-md-3 -flex justify-content-center" style="border:2px solid black;">
                        <div class="card-body"style="border:2px solid black;">
                        <h2 class="card-title text-center">Order ID #  ' . $row['order_id'] .'</h2>
                        <h5 class="card-text text-center">Order Date/Time:  </h5><h5 class="card-text text-center text-primary">'. $row['order_date'] . '<h5>
                        </div>
                        <ul class="list-group list-group-flush" style="border:2px solid black;">
                        <li class="list-group-item"><h5 class="text-center">Order Total: </h5><h5 class="text-center text-primary"> &pound' . $row['total'] . '</h5></li>
                        <li class="list-group-item"><a class="btn btn-dark mx-auto d-block"  href="orderdetails.php?id='.$row['order_id'].'">
                        View Details</a></li>
                        </ul>
                        </div>
                         </div> </br></br>';
                    
                    

			        
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
