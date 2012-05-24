<?php

$input1;
$input2;
$op;
$temp;
$total;

if (isset($_POST['input1']))
{
	$input1 = $_POST['input1'];
}

if (isset($_POST['input2']))
{
	$input2 = $_POST['input2'];
}

if (isset($_POST['op']))
{
	$op = $_POST['op'];
}

switch ($op)
{
	case '-':
		$temp = $input1 - $input2;
		break;
		
	case '*':
		$temp = $input1 * $input2;
		break;
	
	case '/':
		$temp = $input1 / $input2;
		break;
	
	case '+':
	default:
		$temp = $input1 + $input2;
		break;
}

$total = $temp * 1.13;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Money Calculator</title>
		<link href="css/general.css" rel="stylesheet">
	</head>
	
	<body>
	
		<form action="index.php" method="post">
		
			<label for="input1">Number 1: </label>
			<input type="number" id="input1" name="input1">
			
			<label for="input2">Number 2: </label>
			<input type="number" id="input2" name="input2">
			
			<label for="op">Function</label>
			<select id="op" name="op">
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="*">*</option>
				<option value="/">/</option>
			</select>
			
			<button type="button">Calculate</button>
		
			<strong>$<?php echo number_format($total, 2); ?></strong>
			
		</form>
		
	</body>
	
</html>