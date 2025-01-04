<?php
session_start();     //start the session



// Check if form is submitted and method ==post and quantity is set


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity'])) {



    // iterate through the array of quantities to see if wee need to change the quantities for every item in cart
    foreach ($_POST['quantity'] as $itemId => $quantity) {


        // Ensure the quantity is valid and set it in the session cart
        if (isset($_SESSION['cart'][$itemId]) && is_numeric($quantity) && $quantity > 0) {

            
            //this is to update the cart items 
            //first we subtract the previous quantity of items

            $_SESSION['subtotal']=$_SESSION['subtotal']-$_SESSION['item_price'][$itemId]['price'];
            //by division process i get the price for one piece of item
            $_SESSION['item_price'][$itemId]['price']= $_SESSION['item_price'][$itemId]['price'] /$_SESSION['cart'][$itemId]['quantity'];


            
            $_SESSION['cartitems']= $_SESSION['cartitems']-$_SESSION['cart'][$itemId]['quantity'];
            //now we are adding new quantities of items in the session variable
            $_SESSION['cartitems']=$_SESSION['cartitems']+$quantity;

            //here we are changing the quantity corresponding to the item id in cart
            $_SESSION['cart'][$itemId]['quantity'] = $quantity;


            //here the price is changed again by multiplying with quantity
            $_SESSION['item_price'][$itemId]['price']= $_SESSION['item_price'][$itemId]['price'] *$quantity;
            $_SESSION['subtotal']=$_SESSION['subtotal']+$_SESSION['item_price'][$itemId]['price'];
        }
    }
    
    // Redirect back to the cart page or wherever needed
    header('Location: cart.php');
    exit;
}
?>