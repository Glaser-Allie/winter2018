<?php

$header = <<<HTML
<!doctype HTML public>
<html>
<head>
	<title>Pok&eacute; Candy Shoppe</title>
	<link rel='stylesheet' type='text/css' href='./style.css' />
</head>
<body>
	<div class="container" ><h1>Pok&eacute; Candy Shoppe</h1></div>
		
        <header>
            <a href='./index.php?view_cart=1' class="view_cart">View Cart</a>
            <a href='./index.php?empty_cart=1' class="empty_cart">Empty Cart</a>
		</header>
        
		<div class='content'>
HTML;

$footer = <<<HTML
		
        
        </div><!-- End content-->
	</div><!-- End container-->
</body>
</html>
HTML;

?>
