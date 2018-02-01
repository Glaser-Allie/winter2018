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
		$message = "<h5>Invalid item!</h5><br />";
	}
	// If item is already in cart, tell user
	else if(isset($_SESSION['shopping_cart'][$product_id])) {
		$message = "<h5>Item already in cart!</h5><br />";
	}
	// Otherwise, add to cart
	else {
		$_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
		$_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];
		$message = "<h5>Added to cart!</h5>";
	}
}
// Update Cart
if(isset($_POST['update_cart'])) {
	$quantities = $_POST['quantity'];
	foreach($quantities as $id => $quantity) {
		if(!isset($products[$id])) {
			$message = "<h5>Invalid product!</h5>";
			break;
		}
		$_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
	}
	if(!$message) {
		$message = "<h5>Cart updated!</h5><br />";
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
		echo "<div class='breadcrumb'>
			<a href='./index.php' class='breadcrumb'>Shoppe Home</a> &gt; <a href='./index.php'>" . 
			$products[$product_id]['wave'] . "</a></div>";
		
		
		// Display product
		echo "<div class='product_page'>
            <div class='product_img'>" . $products[$product_id]['image'] . "</div><br />
			<div class='product_specs'>
                <div><h3>" . $products[$product_id]['name'] . "</h3></div><br />
			     <div>" . $products[$product_id]['type'] . "</div><br />
                <div><h4>$" . $products[$product_id]['price'] . "</h4><br />for\n3\ncandies</div><br />
            
			<div>
				<form action='./index.php?view_product=$product_id' method='post'>
					<select name='quantity'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                        <option value='9'>9</option>
                        
					</select>
					<input type='hidden' name='product_id' value='$product_id' />
					<input type='submit' name='add_to_cart' value='Add to cart' />
				</form>
			</div>
            </div>
		</div>";
	}
	else {
		echo "Invalid product!";
	}
}
// View cart
else if(isset($_GET['view_cart'])) {
	// Display site links
	echo "<a href='./index.php' class='breadcrumb'>Shoppe Home</a>";
	
	echo "<h2>Your Cart</h2>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "<h5>Your cart is empty.<h5><br />";
	}
	else {
		echo "<form action='./index.php?view_cart=1' method='post' class='cart_form'>
				<ul class='cart_header'>
                    <li class='name'>Name</li>
					<li class='price'>Price</li>
					<li class='quantity'>Qty</li>
				</ul>";
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					echo "<ul>
						<li class='name'><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></li>
						<li class='price'>" . $products[$product_id]['price'] . "</li>
						<li class='quantity'>
							<input type='text' maxlength='5' class='quantity_input' name='quantity[$product_id]' value='" . $product['quantity'] . "' /><input type='submit' name='update_cart' value='Update' /></li>
					</ul>";
				}
			echo "</ul>
			
			</form>
			<div class='checkout'>
				<a href='./index.php?checkout=1'>Checkout</a>
			</div>
            
            ";
	}
}
// Checkout
else if(isset($_GET['checkout'])) {
	// Display site links
	echo "<a href='./index.php' class='breadcrumb'>Shoppe Home</a>";
	
	echo "<h2>Checkout</h2>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";
	}
	else {
		echo "<form action='./index.php?checkout=1' method='post'>
		<ul class='cart_header'>
                    <li class='name'>Name</li>
					<li class='price'>Price</li>
					<li class='quantity'>Qty</li>
				</ul>";
				
				$total_price = 0;
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					
					$total_price += $products[$product_id]['price'] * $product['quantity'];
					echo "           
                    <ul>
                    <li class='name'><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></li>
                            <li class='price' >$" . $products[$product_id]['price'] . "</li> 
						<li class='quantity'>" . $product['quantity'] . "</li>
						<li class='calc_price'>$" . number_format(($products[$product_id]['price'] * $product['quantity']),2) . "</li>
                        </ul>
						
					";
				}
			echo "
            <ul>
			<li class='total'>Total price:\n\n\n</li><li class='final_total'>$" . number_format($total_price,2) . "<li>
            </ul>
            
            <div class='checkout_info'>
            <p>Please enter your shipping information:</p>

			<input type='text' placeholder='Name' name='name'>
			<br/>
            <br/>

			<input type='text' placeholder='Email Address' name='email'>
			<br/>
            <br/>
            
			<input type='text' placeholder='Street Address' name='address'>
			<br/>
            <br/>
            
            
            <div class='citystatezip'>
            <input type='text' placeholder='City' name='city'>\n\n 
            <input type='text' placeholder='State' name='state' maxlength='2'>\n\n\n\n
            <input type='text' placeholder='Zip' name='zip' maxlength='5'>
            </div>
            
			<br />
            <input type='submit' value='Complete Purchase'>
            </div>";
            
     
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
			<div><h4><a href='./index.php?view_product=$id'>" . $product['name'] . "</h4></div>
            <div>" . $product['image'] . "</div></a>
			<div class='card_description'>" . $product['type'] . "\n\n|\n\n" . $product['wave'] . "\n Wave</div>
            <div>$" . $product['price'] . "</div>
            <form action='./index.php?view_product=$product_id' method='post'>
					<input type='hidden' name='product_id' value='$product_id' />
					<input type='submit' name='add_to_cart' value='Add to cart' />
				</form>
            
		</div>";
	}
}
	

echo $footer;

?>
