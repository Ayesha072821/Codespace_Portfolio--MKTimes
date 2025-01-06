<?php
session_start();
//Assuming you have the item_id available (e.g., from a button or link)
$item_id = $_GET['id']; // You can use a POST or GET parameter to get the item ID

// Check if the item exists in the cart
if (isset($_SESSION['cart'][$item_id])) {
    

    //here we change the number of items in cart by subtracting the quantity of items against that id we got in get parameter.
    $_SESSION['cartitems']=$_SESSION['cartitems']-$_SESSION['cart'][$item_id]['quantity'];



    //here the subtotal is also changed by subtracting the price against that item id in session variable
    $_SESSION['subtotal']=$_SESSION['subtotal']-$_SESSION['item_price'][$item_id]['price'];


    //here we remove that item id from session cart
    unset($_SESSION['cart'][$item_id]);

    //here we remove the price against that id from session price variable
    unset($_SESSION['item_price'][$item_id]);
    
    // user is redirected to the cart page where the updated data is displayed
    header("Location:cart.php"); // Redirect to the cart page (or any other page)
    exit();  //exit after the redirect
} else {

    // If the item doesn't exist in the cart its shown that no item is found
    echo "Item not found in the cart.";
}
?>