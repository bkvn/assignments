jQuery (function ($) {
	var $ball = $('#letter'), $prop = $('#prop'), $color = $('#color');
	$('#colorInput').submit(function (evt) {
		evt.preventDefault();
		var color = $color.val();
		
		if (color)
			$ball.css($prop.val(), color);
	});
	
	$('#hide').click(function () {
		$ball.toggle(150, "linear");
	});
});