<?php
session_start();    //starting the session
include "includes/header.html";      //inculding the navigation bar
include "getfemalewatches.php";   //this file bring all female category watches from database
if(isset($_SESSION['userid']))     //if user have logged in
{

    // this script changes all the required buttons when user is signed in

    include "includes/change_references.php";

   
    //here the session variable store this string so that if user go to addtocart then this is used to return to thesame page.
    
   $_SESSION["from"]="femalecollection";

}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sort_option'])) {
    $sort_option = $_POST['sort_option'];
    if ($sort_option === 'low_to_high') {
        // Sort by price: low to high
        usort($data, fn($a, $b) => $a['item_price'] <=> $b['item_price']);
    } elseif ($sort_option === 'high_to_low') {
        // Sort by price: high to low
        usort($data, fn($a, $b) => $b['item_price'] <=> $a['item_price']);
    }

    elseif ($sort_option === 'A_Z') {
        // Sort by price: high to low
        usort($data, fn($a, $b) => $a['item_name'] <=> $b['item_name']);
    }

    elseif ($sort_option === 'Z_A') {
        // Sort by price: high to low
        usort($data, fn($a, $b) => $b['item_name'] <=> $a['item_name']);
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>MKTimes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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
<form method="post" class="text-center my-4">
        <label for="sort_option">Sort by:</label>
        <select name="sort_option" id="sort_option" class="form-control w-25 d-inline">
            <option value="low_to_high">Price: Low to High</option>
            <option value="high_to_low">Price: High to Low</option>
            <option value="A_Z">Name: A-Z</option>
            <option value="Z_A">Name: Z-A</option>
        </select>
        <button type="submit" class="btn btn-dark">Sort</button>
    </form>
</br>
    </br>
    </br>
    <div class="card-container  d-flex justify-content-center">
    <?php
        //here all the derived data is displayed in form of cards
        $counter = 0;   //this variable is used to display 3 cards in a row
    
    
        foreach ($data as $item) {
            if ($counter % 2 == 0 && $counter != 0) {
                    
                echo '</div><div class="card-container d-flex justify-content-center">';
            }
            echo '<div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100" style="width: 25rem;">
	            <img src='. $item['item_img'].' class=" card-image card-img-top" alt="T-Shirt">
	            <div class="card-body">
	            <h5 class="card-title text-center">' . $item['item_name'] .'</h5>
	            <p class="card-text">'. $item['item_desc'] . '</p>
                </div>
	            <ul class="list-group list-group-flush">
	            <li class="list-group-item"><p class="text-center">&pound' . $item['item_price'] . '</p></li>
	            <li class="list-group-item"><a class="btn btn-dark mx-auto d-block"  href="addtocart.php?id='.$item['item_id'].'&price='.$item['item_price'].'">
	            ADD to cart</a></li>
	            </ul>
	            </div>
                 </div>
                 </div>';
            $counter++;
        }
    
        
    ?>
    </div>
</body>
</html>
<?php
include "includes/footer.html";
?>