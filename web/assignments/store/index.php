<?php
session_start();

require("products.php");
require("layout.php");

// Initialize cart
if(!isset($_SESSION['shopping_cart'])) {
	$_SESSION['shopping_cart'] = array();
}
// Empty cart
if(isset($_GET['empty_cart'])) {
	$_SESSION['shopping_cart'] = array();
}


// **PROCESS FORM DATA**

$message = '';

// Add product to cart
if(isset($_POST['add_to_cart'])) {
	$product_id = $_POST['product_id'];
	
	// Check for valid item
	if(!isset($products[$product_id])) {
		$message = "Invalid item!<br />";
	}
	// If item is already in cart, tell user
	else if(isset($_SESSION['shopping_cart'][$product_id])) {
		$message = "Item already in cart!<br />";
	}
	// Otherwise, add to cart
	else {
		$_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
		$_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];
		$message = "Added to cart!";
	}
}
// Update Cart
if(isset($_POST['update_cart'])) {
	$quantities = $_POST['quantity'];
	foreach($quantities as $id => $quantity) {
		if(!isset($products[$id])) {
			$message = "Invalid product!";
			break;
		}
		$_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
	}
	if(!$message) {
		$message = "Cart updated!<br />";
	}
}


// **DISPLAY PAGE**
echo $header;

echo $message;

// View a product
if(isset($_GET['view_product'])) {
	$product_id = $_GET['view_product'];
	
	if(isset($products[$product_id])) {
		// Display site links
		echo "<p>
			<a href='./index.php' class='breadcrumb'>Shoppe Home</a> &gt; <a href='./index.php'>" . 
			$products[$product_id]['wave'] . "</a></p>";
		
		
		// Display product
		echo "<p>
			<span style='font-weight:bold;'>" . $products[$product_id]['name'] . "</span><br />
			<span>" . $products[$product_id]['type'] . "</span><br />
			<span>" . $products[$product_id]['image'] . "</span><br />
            <span>$" . $products[$product_id]['price'] . "</span><br />
			<p>
				<form action='./index.php?view_product=$product_id' method='post'>
					<select name='quantity'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
					</select>
					<input type='hidden' name='product_id' value='$product_id' />
					<input type='submit' name='add_to_cart' value='Add to cart' />
				</form>
			</p>
		</p>";
	}
	else {
		echo "Invalid product!";
	}
}
// View cart
else if(isset($_GET['view_cart'])) {
	// Display site links
	echo "<p>
		<a href='./index.php'>Shoppe Home</a></p>";
	
	echo "<h2>Your Cart</h2>
	<p>
		<a href='./index.php?empty_cart=1'>Empty Cart</a>
	</p>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";
	}
	else {
		echo "<form action='./index.php?view_cart=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
				<tr>
					<th style='border-bottom:1px solid #000000;'>Name</th>
					<th style='border-bottom:1px solid #000000;'>Price</th>
					<th style='border-bottom:1px solid #000000;'>Quantity</th>
				</tr>";
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></td>
						<td style='border-bottom:1px solid #000000;'>" . $products[$product_id]['price'] . "</td>
						<td style='border-bottom:1px solid #000000;'>
							<input type='text' name='quantity[$product_id]' value='" . $product['quantity'] . "' /></td>
					</tr>";
				}
			echo "</table>
			<input type='submit' name='update_cart' value='Update' />
			</form>
			<p>
				<a href='./index.php?checkout=1'><h2>Checkout<h2></a>
			</p>";
		
	}
}
// Checkout
else if(isset($_GET['checkout'])) {
	// Display site links
	echo "<p>
		<a href='./index.php' class='breadcrumb'>Shoppe Home</a></p>";
	
	echo "<h3>Checkout</h3>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";
	}
	else {
		echo "<form action='./index.php?checkout=1' method='post'>
		";
				
				$total_candy = 0;
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					
					$total_candy += $products[$product_id]['price'] * $product['quantity'];
					echo "<div><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></div>
						<div>" . $products[$product_id]['price'] . "</div> 
						<div>" . $product['quantity'] . "</div>
						<div>" . ($products[$product_id]['price'] * $product['quantity']) . "</div>
					";
				}
			echo "
			<p>Total price: " . $total_price . "</p>";
		
	}
}
// View all products
else {
	// Display site links
	echo "<a href='./index.php' class='breadcrumb'>Shoppe Home</a>";
	
	echo "<h2>Hoenn Region Pok&eacute;mon</h2>";

	// Loop to display all products
	foreach($products as $id => $product) {
		echo "<div class='pokecard'>
			<div><h4><a href='./index.php?view_product=$id'>" . $product['name'] . "</h4></a></div>
            <div>" . $product['image'] . "</div>
			<div class='card_description'>" . $product['type'] . "\n\n|\n\n" . $product['wave'] . "\n Wave</div>
            <div>$" . $product['price'] . "</div>
		</div>";
	}
}
	

echo $footer;

?>