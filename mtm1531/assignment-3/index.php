<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$lang = filter_input(INPUT_POST, 'lang', FILTER_SANITIZE_STRING);
$notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);
$errors = array();
$msg = false;
$subject = 'Thank you for registering!';
$bodyTxt = 'We have received your form and would like to inform you that you have been registered.';
$header = "From: kova0058@algonquinlive.com\r\n";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (empty($name))
		$errors['name'] = true;
		
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		$errors['email'] = true;
		
	if (strlen($username) > 25 || strlen($username) <= 0)
		$errors['username'] = true;
		
	if (empty($password))
		$errors['password'] = true;
		
	if (!in_array($lang, array('en', 'fr', 'es')))
		$errors['lang'] = true;
	
	if (!isset($_POST['terms']))
		$errors['terms'] = true;
		
	if (empty($errors))
	{
		$msg = true;
		mail($email, $subject, $bodyTxt, $header);
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration Form Validation</title>
		<link href="css/general.css" rel="stylesheet">
	</head>
	
	<body>
		
		<?php if ($msg == true) : ?>
		<div id="thankMsg">
			<h1>Thank you for registering!</h1>
		</div>
		
		<?php else  : ?>
		<form action="index.php" method="post">
			
			<div class="inputWrapper">
				<label for="name">Name: </label>
				<input id="name" type="text" name="name" value="<?php echo $name; ?>">
				<?php if (isset($errors['name'])) : ?><strong>Please type your name</strong><?php endif; ?>
			</div>
			
			<div class="inputWrapper">
				<label for="email">Email: </label>
				<input id="email" type="email" name="email" placeholder="name@email.com" value="<?php echo $email; ?>">
				<?php if (isset($errors['email'])) : ?><strong>Please type an appropriate email address</strong><?php endif; ?>
			</div>
			
			<div class="inputWrapper">
				<label for="username">Username: </label>
				<input id="username" type="text" name="username" value="<?php echo $username; ?>">
				<?php if (isset($errors['username'])) : ?><strong>You have not typed a username or it is larger than 25 characters</strong><?php endif; ?>
			</div>
			
			<div class="inputWrapper">
				<label for="password">Password: </label>
				<input id="password" type="password" name="password" value="<?php echo $password; ?>">
				<?php if (isset($errors['password'])) : ?><strong>Please type your password</strong><?php endif; ?>
			</div>
			
			<fieldset>
			
				<legend>Choose Your language</legend>
				
				<label for="en_lang">English: </label>
				<input id="en_lang" type="radio" name="lang" value="en"<?php if ($lang == 'en') { echo 'checked'; } ?>>
				
				<label for="fr_lang">French: </label>
				<input id="fr_lang" type="radio" name="lang" value="fr"<?php if ($lang == 'fr') { echo 'checked'; } ?>>
				
				<label for="es_lang">Spanish: </label>
				<input id="es_lang" type="radio" name="lang" value="es"<?php if ($lang == 'es') { echo 'checked'; } ?>>
				
				<?php if (isset($errors['lang'])) : ?><strong>Please select your language</strong><?php endif; ?>
				
			</fieldset>
			
			<label for="notes">Notes: </label>
			<textarea id="notes" name="notes"></textarea>
			
			<label for="terms">I have read and accept the terms. </label>
			<input id="terms" type="checkbox" name="terms" value="1"<?php if (isset($_POST['terms'])) { echo 'checked'; } ?>>
			<?php if (isset($errors['terms'])) : ?><strong>You have to agree the terms to register.</strong><?php endif; ?>
			
			<button type="submit">Register!</button>
			
		</form>
		
		<?php endif; ?>
		
	</body>
	
</html>