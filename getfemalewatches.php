<?php
require 'db_connection.php';    //database connection file

# Retrieve items from 'products' database table.
	$q = "SELECT item_id,item_name,item_desc,item_price,item_img FROM products where item_category='Female'" ;
	$r = mysqli_query( $link, $q ) ;
	$data=array();
	if ( mysqli_num_rows( $r ) > 0 )
	{
		while($row=$r->fetch_assoc())
		{
			$data[]=$row;
		}


	}
	else
	{
		echo 'no items to display';
	}


# Close database connection.
	mysqli_close( $link) ; 
	
	
?>