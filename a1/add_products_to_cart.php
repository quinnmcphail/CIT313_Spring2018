 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>I've Got A Lovely Bunch of Coconuts: Add Inventory!</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL_ROOT . '/styles.css' ?>" />
</head>

<body>
This page is adding each inventory to the inventory array.  Once it's finished, it will redirect you to the Shopping page.

<?php
	//this page stores the requested items in a shopping cart array, which is stored in Session
	include_once('webconfig.php');
	include_once(ABSOLUTE_PATH . '/classes/product.class.php');
	include_once(ABSOLUTE_PATH . '/classes/veggie_product.class.php');
	session_start();
	
	//unset the current cart array in session and start fresh
	unset($_SESSION['aryCartArray']);
	
	$aryCartArray = array();
	
	//retrieve the inventory array from session
	$aryProductsArray = unserialize($_SESSION['aryProductArray']);
	

	
	for ($x=0; $x<count($aryProductArray); $x++) {
		
		//first, see if the product's quantity has a value
		if (!empty($_POST['quantity' . $x]))  {
			
			//product's quantity is not empty, so this item should be placed in the cart.
			
			//to do this, we will create a local array that contains the product_id and the quantity, and then push that ARRAY OBJECT onto the $aryCartArray
			//you will essentially end up with an array (cart) of arrays (items in the cart)
			
			$aryCartItemArray = array($x, $_POST['quantity' . $x]);
			
			//add cart item array to the cart array	
			array_push($aryCartArray, $aryCartItemArray);
			       
		}
		
	}

	//if the cart array is not empty, put it into the Session
	$_SESSION['aryCartArray'] = serialize($aryCartArray);
	
	session_write_close();
	
	
	//send user to the view_cart.php screen
	header( 'Location: ' . URL_ROOT . '/view_cart.php' );
?>

</body>
</html>	
