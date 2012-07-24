<?php
	$getLink = '';
			
	if (isset($_GET['getLink']))
	{
		$getLink = strtolower($_GET['getLink']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Progressive Enhancement</title>
		<link href="css/general.css" rel="stylesheet">
	</head>

	<body>
	
	<div class="wrapper">
	
		<div class="navWrapper">
			<ul>
				<li<?php if ($getLink != 'products' && $getLink != 'about' && $getLink != 'contact') { ?> class="current"<?php } ?> id="link_1"><a href="?getLink=home">Home</a></li>
				<li<?php if ($getLink == 'products') { ?> class="current"<?php } ?> id="link_2"><a href="?getLink=products">Products</a></li>
				<li<?php if ($getLink == 'about') { ?> class="current"<?php } ?> id="link_3"><a href="?getLink=about">About Us</a></li>
				<li<?php if ($getLink == 'contact') { ?> class="current"<?php } ?> id="link_4"><a href="?getLink=contact">Contact</a></li>
			</ul>
		</div>
		
		<div class="tabContent">
		
		<?php
					
			switch ($getLink)
			{									
					case 'products':
						include 'products.php';
					break;
					
					case 'about':
						include 'about.php';
					break;
					
					case 'contact':
						include 'contact.php';
					break;
					
					case 'home':
					default:
						include 'home.php';
					break;
			}
		?>
		
		</div>
		
	</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/general.js"></script>
		
	</body>
	
</html>