<?php
require 'db_connection.php';

# Retrieve items from 'products' database table.
	$q = "SELECT item_id,item_name,item_desc,item_price,item_img FROM products where item_category='Male'" ;
	$r = mysqli_query( $link, $q ) ;
	$mdata=array();
	if ( mysqli_num_rows( $r ) > 0 )
	{
		while($row=$r->fetch_assoc())
		{
			$mdata[]=$row;
		}
	}
	else{
		echo 'there are no products to display';
	}




# Close database connection.
	mysqli_close( $link) ; 
	
	
?>