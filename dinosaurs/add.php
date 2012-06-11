<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Dinosaur</title>
    </head>

    <body>
    
    	<form action="add.php" method="post">
        
        	<label for="dinoName">Dino Name</label>
        	<input type="text" name="dinoName" id="dinoName" required>
            
            <fieldset>
            	<legend>Relationshop with meat</legend>
                <input type="radio" id="love" name="loves_meat" value="1">
                <label for="love">Loves Meat</label>
                <input type="radio" id="hate" name="loves_meat" value="0">
                <label for="hate">Hates Meat</label>
            </fieldset>
            
            <input type="checkbox" id="in_jurassic_park" name="in_jurassic_park">
            <label for="in_jurassic_park">In Jurassic Park?</label>
            
            <button type="submit">Submit</button>
        
        </form>
    </body>
</html>