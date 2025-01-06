<?php
//session_start();

//this file change the refernces when user have signed in.
 
echo '<script>


const ord=document.getElementById("orderhistory");
ord.setAttribute("href","vieworders.php");
ord.innerHTML="View Order History";


const contact=document.getElementById("contact");
contact.setAttribute("href","contactform.php");


const change=document.getElementById("signinout");
change.setAttribute("href","logout.php");
change.innerHTML="Log Out";

const def=document.getElementById("register");
def.setAttribute("href","");
def.innerHTML="";

const cartbutton=document.getElementById("cart").className="cart-icon btn btn-dark";


const count=document.getElementById("item_count");
count.innerHTML="'.$_SESSION['cartitems'].'";

const herinheader=document.getElementById("herfromheader");
herinheader.setAttribute("href","femalecollection.php");


const himinheader=document.getElementById("himfromheader");
himinheader.setAttribute("href","malecollection.php");




const cart=document.getElementById("cart");
cart.setAttribute("href","cart.php");

</script>';
// a welcome message is printed with the name of user stored in session variable
echo '<script>
var name="Welcome "+"'.$_SESSION['userfirstname'].'";
document.getElementById("welcome").innerHTML=name;
</script>';






?>