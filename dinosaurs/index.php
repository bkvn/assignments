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
    	<form action="insert.php" method="post">
        
        	<label for="dinoName">Dino Name</label>
        	<input type="text" name="dinoName" id="dinoName">
            
            <label for="lovesMeat">Loves Meat</label>
        	<input type="text" name="lovesMeat" id="lovesMeat">
            
            <label for="jPark">In Jurassic Park</label>
        	<input type="text" name="jPark" id="jPark">
            
            <button type="submit">Submit</button>
        
        </form>
        
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