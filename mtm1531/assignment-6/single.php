<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = $db->prepare('
	SELECT id, title, genre, director, release_date
	FROM movies
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $results['title']; ?></title>
        <link href="css/general.css" rel="stylesheet">
    </head>

    <body>
    
    	<h1><?php echo $results['title']; ?></h1>
        <dl>
        	<dt>Genre</dt>
            <dd><?php echo $results['genre']; ?></dd>
            <dt>Director</dt>
            <dd><?php echo $results['director']; ?></dd>
            <dt>Release Date</dt>
            <dd><?php echo $results['release_date']; ?></dd>
        </dl>
        
        <p><a href="delete.php?id=<?php echo $id; ?>">Delete</a>
        <a href="edit.php?id=<?php echo $id; ?>">Edit</a></p>
        <a href="index.php">Back to Home</a>
    </body>
</html>