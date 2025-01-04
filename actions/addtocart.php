<?php
session_start();     //session started to access all session variables


if(isset($_GET['id']))                 //here i checked if i got item id as a GET paramerer
{
    $toadd=$_GET['id'];               // i saved the passed item id through GET, in a veriable


    $price=$_GET['price'];            // along with the id price of that item is also passes so that it can also be saved


    if(isset($_SESSION['cart'][$toadd]))        //checking wheter the item id already exists  if yes
    {


        $_SESSION['cart'][$toadd]['quantity']++;    //the quantity in session variable for that item id is increased

        $_SESSION['item_price'][$toadd]['price']=$price*$_SESSION['cart'][$toadd]['quantity'];  // here the price also changed according to number of items


        
    }

    else{       //if that item_id dont exist 
        
        $_SESSION['cart'][$toadd]['quantity']=1;   //that item id is set alongside with 1 quantity.


        $_SESSION['item_price'][$toadd]['price']=$price;   //since quantity is 1 so just the price from get parameter is saved in session variable
        
    }


    $_SESSION['subtotal']=$_SESSION['subtotal']+$price;  //price of added items is stored in session variable


    $_SESSION['cartitems']=$_SESSION['cartitems']+1;    //this session variable keep track of items in cart so it also increases by 1 when an item is added

}

//as i have displayed products in two different categories so when an item was added i was taking user back to index page 
//where user needs to select the option again for viewing products
//i wanted the user to go back to the page from where he adds the item.
//so i came with this solution to save the string in session variable.
//when user adds an item from female products page it saves female collection string and vice versa

if(isset($_SESSION['from']))      // here i checked whether tthis variable is set or not
{
    if($_SESSION['from']=="malecollection")    //if its set to malecollection header should direct back to male collection page
    {
        header('Location:../malecollection.php');
       exit();  //exit after the redirect
    }
    if($_SESSION['from']=="femalecollection")    //if its set to femalecollection header should direct back to female collection page
    {
        header('Location:../femalecollection.php');
        exit();  //exit after the redirect
    }
}
?>