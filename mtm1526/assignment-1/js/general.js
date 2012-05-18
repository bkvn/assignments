looper();

function looper() 
{
	var letter;

	while (!letter)
		letter = prompt('Enter a letter.');

	for (var i = 0; i < 10; i++)
		document.write(letter + '<br>');

	document.write('<br>');
		
	for (var j = 0; j < 10; j++)
	{
		for (var k = 0; k < j + 1; k++)
			document.write(letter);
		document.write('<br>');
	}
}