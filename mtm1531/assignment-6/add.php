<?php

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING);
$release_date = filter_input(INPUT_POST, 'release_date', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (strlen($title) < 1 || strlen($title) > 256) {
		$errors['title'] = true;
	}
	
	if (strlen($genre) < 1 || strlen($genre) > 256) {
		$errors['genre'] = true;
	}
	
	if (strlen($director) < 1 || strlen($director) > 256) {
		$errors['director'] = true;
	}
	
	if (strlen($release_date) < 1 || strlen($release_date) > 256) {
		$errors['release_date'] = true;
	}
	
	if (empty($errors)){
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			INSERT INTO movies (title, genre, director, release_date)
			VALUES (:title, :genre, :director, :release_date)
		');
		$sql->bindValue(':title', $title, PDO::PARAM_STR);
		$sql->bindValue(':genre', $genre, PDO::PARAM_STR);
		$sql->bindValue(':director', $director, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}
?><!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Movie</title>
        <link href="css/general.css" rel="stylesheet">
    </head>

    <body>
    
    	<form action="add.php" method="post">
        
        	<label for="title">Title
            	<?php if (isset($errors['title'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="title" id="title" required value="<?php echo $title; ?>">
        	
        	<label for="genre">Genre
            	<?php if (isset($errors['genre'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="genre" id="genre" required value="<?php echo $genre; ?>">
        	
        	<label for="director">Director
            	<?php if (isset($errors['director'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="director" id="director" required value="<?php echo $director; ?>">
        	
        	<label for="release_date">Release Date
            	<?php if (isset($errors['release_date'])) : ?>
                <strong class="error">is required.</strong>
                <?php endif; ?>
            </label>
        	<input type="text" name="release_date" id="release_date" required value="<?php echo $release_date; ?>">
            
            <button type="submit">Add</button>
            
            <a href="index.php">Back to Home</a>
        
        </form>
    </body>
</html>