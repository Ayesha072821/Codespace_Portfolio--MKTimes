<?php
session_start();
include ("header.html");
include ("db_connection.php");
if(isset($_SESSION['userid']))     //if user have logged in
{
    

    $_SESSION['cartitems']=0;  

    include "change_references.php";


}


if(!empty($_SESSION['cart']))
{
    //on pressing checkout new order is created using user id and subtotal for that order is stored
    $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['userid'].",".$_SESSION['subtotal'].", NOW() ) ";
    $r = mysqli_query ($link, $q);

    //here we get the recently added order id
    $order_id=mysqli_insert_id($link);

    //in this query we are getting details of products from database
    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
    $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
    $r = mysqli_query ($link, $q);


    while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
    {
    


        // this query inserts the items correspong to the order id.
        //session variable is storing the item ids in cart

        $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
        VALUES ( $order_id, 
         ".$row['item_id'].",
         ".$_SESSION['cart'][$row['item_id']]['quantity'].",
         ".$_SESSION['item_price'][$row['item_id']]['price'].")" ;
        $result = mysqli_query($link,$query);
}


$id=$_SESSION['userid'];     //store value of session variable in another variable
                $q="SELECT email from users WHERE user_id='$id'";    //query to retrieve user email
                $r=@mysqli_query($link,$q);     //execute the query
                if(mysqli_num_rows($r) !=0)     // if any row is retrieved
                    {
                        $result=mysqli_fetch_array($r,MYSQLI_ASSOC);
                        //we use user email to send email to user
                        $to_email = $result['email'];
                        $subject = "Order Confiramation: Order # ". $order_id;
                        

                        //an email is sent to user confirming his order with order id as a subject

                        $body = "Thanks for your order you can now see order details on your MKTIMES account.";
                        $headers = "From: mktime.watches@gmail.com";
                       //try to send the email
                        if (mail($to_email, $subject, $body, $headers)) {
                            //if email is successfull make user aware of it
                            echo "<h5>Order Confirmation Email have been sent to your Registered Email.</h5>";
                             } else {
                            // if not successful print an error message.
                          echo "<h5>Message sending failed to Your Account. You can still View Your order details on your MKTIMES account.</h5>";
                        }
                    }






echo "<h2>Thanks for your order.Your orderNumber is #".$order_id."</h2>"; 
echo "<h5>Order Details</h5>"; 
//query to get the order items and their detailsd from database

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
             
                    <div class="col-sm-3 " style="border:2px solid black;">
                        
                        <img   style="width:150px; height:150px;"  src='. $row['item_img'].'  alt=""></div>
                        
                        
                        <div class="col-sm-3 d-flex justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <h5><i>'. $row['item_name'].'</i> </h5></div>
                      
                        
                        <div class="col-sm-3 d-flex justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <h5><i>'. $row['quantity'].'</i> </h5></div>
                      
                         <div class="col-sm-3 d-flex justify-content-center align-items-center" style="border:2px solid black;">
                        
                        <h5> <i> '. $row['price'].' </i></h5></div>
     
                    </div></br></br>';     

			        
		        }
            }
            echo '<h4 style="float:right; border:3px solid black;">Subtotal : '.$_SESSION['subtotal'].'</h4></br></br>';
            echo '<a class="btn btn-dark"type="submit" style="float:right;" href="index.php">Continue Shopping';
            ;

	
	       
        



mysqli_close($link);

//here we remove that item id from session cart
unset($_SESSION['cart']);

//here we remove the price against that id from session price variable
unset($_SESSION['item_price']);

   

 $_SESSION['subtotal']=0; 




}
else{
    echo '<h2>There are no items in cart.</h2>'; 
}

?>