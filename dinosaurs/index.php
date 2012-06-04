<?php
require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, dino_name, loves_meat, in_jurassic_park
	FROM dinosaurs
	ORDER BY dino_name ASC
');

// Display the last error created by our database
// var_dump($db->errorInfo());

$results = $sql->fetchAll();


?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>
    	<?php foreach ($results as $dino) : ?>
        <h2><a href="single.php?id=<?php echo $dino['id']; ?>"><?php echo $dino['dino_name']; ?></a></h2>
    	<dl>
        	<dt>Love Meat</dt>
            <dd><?php echo $dino['loves_meat']; ?></dd>
            <dt>In Jurassic Park</dt>
            <dd><?php echo $dino['in_jurassic_park']; ?></dd>
        </dl>
        <?php endforeach; ?>
        
        <!--<h2>Pterodactyl</h2>
    	<dl>
        	<dt>Love Meat</dt>
            <dd>1</dd>
            <dt>In Jurassic Park</dt>
            <dd>0</dd>
        </dl>
        
        
        
        <h2>Tyrannosaurus Rex</h2>
    	<dl>
        	<dt>Love Meat</dt>
            <dd>1</dd>
            <dt>In Jurassic Park</dt>
            <dd>1</dd>
        </dl>
        
        <h2>Stegosaurus</h2>
    	<dl>
        	<dt>Love Meat</dt>
            <dd>0</dd>
            <dt>In Jurassic Park</dt>
            <dd>1</dd>
        </dl>
        
        <h2>Triceratops</h2>
    	<dl>
        	<dt>Love Meat</dt>
            <dd>0</dd>
            <dt>In Jurassic Park</dt>
            <dd>1</dd>
        </dl>-->
    
    </body>
</html>