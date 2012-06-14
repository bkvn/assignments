<?php
require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, title, genre, director, release_date
	FROM movies
	ORDER BY title ASC
');

$results = $sql->fetchAll();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Movie List</title>
    </head>
    
    <body>
    	<form action="insert.php" method="post">
        
        	<label for="title">Title</label>
        	<input type="text" name="title" id="title">
            
            <label for="genre">Genre</label>
        	<input type="text" name="genre" id="genre">
            
            <label for="director">In Jurassic Park</label>
        	<input type="text" name="director" id="director">
        	
        	<label for="release_date">Release Date</label>
        	<input type="text" name="release_date" id="release_date">
            
            <button type="submit">Submit</button>
        
        </form>
        
    	<?php foreach ($results as $movie) : ?>
        <h2><a href="single.php?id=<?php echo $movie['id']; ?>"><?php echo $movie['title']; ?></a></h2>
    	<dl>
        	<dt>Genre</dt>
            <dd><?php echo $movie['genre']; ?></dd>
            <dt>Director</dt>
            <dd><?php echo $movie['director']; ?></dd>
            <dt>Release Date</dt>
            <dd><?php echo $movie['release_date']; ?></dd>
        </dl>
        <?php endforeach; ?>
        
	</body>
</html>