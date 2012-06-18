<?php
require_once 'includes/db.php';

$errors = array();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
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
			UPDATE movies
			SET title = :title, genre = :genre, director = :director, release_date = :release_date
			WHERE id = :id
		');
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':title', $title, PDO::PARAM_STR);
		$sql->bindValue(':genre', $genre, PDO::PARAM_STR);
		$sql->bindValue(':director', $director, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
} else {
	
	$sql = $db->prepare('
		SELECT title, genre, director, release_date
		FROM movies
		WHERE id = :id 
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$title = $results['title'];
	$genre = $results['genre'];
	$director = $results['director'];
	$release_date = $results['release_date'];	
}
?><!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Movie</title>
        <link href="css/general.css" rel="stylesheet">
    </head>

    <body>
    
    	<form id="editForm" action="edit.php?id=<?php echo $id; ?>" method="post">
        
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
            
            <button type="submit">Save</button>
            
            <a href="index.php">Back to Home</a>
        
        </form>
        
    </body>
    
</html>