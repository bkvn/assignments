<?php

$dino_name = filter_input(INPUT_POST, 'dino_name', FILTER_SANITIZE_STRING);
$loves_meat = filter_input(INPUT_POST, 'loves_meat', FILTER_SANITIZE_NUMBER_INT);
$in_jurassic_park = (isset($_POST['in_jurassic_park'])) ? 1 : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($dino_name) < 1 || strlen($dino_name) > 256) {
		$errors['dino_name'] = true;
	}
	
	if (!in_array($loves_meat, array(0, 1))) {
		$errors['loves_meat'] = true;
	}
	
	if (empty($errors)){
		
	}
}
?><!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Dinosaur</title>
    </head>

    <body>
    
    	<form action="add.php" method="post">
        
        	<label for="dino_name">Dino Name
            	<?php if (isset($errors['dino_name'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="dino_name" id="dino_name" required value="<?php echo $dino_name; ?>">
            
            <fieldset>
            	<legend>Relationshop with meat
                	<?php if (isset($errors['loves_meat'])) : ?>
                    <strong class="error">is required.</strong>
                    <?php endif; ?>
                </legend>
                <input type="radio" id="love" name="loves_meat" value="1"
                <?php if ($loves_meat == 1) : ?>checked<?php endif; ?>>
                
                <label for="love">Loves Meat</label>
                <input type="radio" id="hate" name="loves_meat" value="0"
                <?php if ($loves_meat == 0) : ?>checked<?php endif; ?>>
                
                <label for="hate">Hates Meat</label>
            </fieldset>
            
            <input type="checkbox" id="in_jurassic_park" name="in_jurassic_park"
            <?php if ($in_jurassic_park == 1) : ?>checked<?php endif; ?>>
            <label for="in_jurassic_park">In Jurassic Park?</label>
            
            <button type="submit">Add</button>
        
        </form>
    </body>
</html>