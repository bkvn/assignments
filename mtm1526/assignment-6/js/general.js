var page = new Array();
page[1] = 'home.php';
page[2] = 'products.php';
page[3] = 'about.php';
page[4] = 'contact.php';

$('.tabContent').load(page[1]);

function loadTab(id) {
	if (page[id].length > 0) {
		
		$.ajax(
		{
			url: page[id], 
			cache: true,
			success: function() 
			{			            	
				$('.tabContent').load(page[id]);
			}
		});		
	}
}

$(document).ready(function(){

	$('#link_1').click(function(ev)
	{
		ev.preventDefault();
		$('li').removeClass('current');
		$('#link_1').addClass('current');
		loadTab(1);
	});
	
	$('#link_2').click(function(ev)
	{
		ev.preventDefault();
		$('li').removeClass('current');
		$('#link_2').addClass('current');
		loadTab(2);
	});
	
	$('#link_3').click(function(ev)
	{
		ev.preventDefault();
		$('li').removeClass('current');
		$('#link_3').addClass('current');
		loadTab(3);
	});
	
	$('#link_4').click(function(ev)
	{
		ev.preventDefault();
		$('li').removeClass('current');
		$('#link_4').addClass('current');
		loadTab(4);
	});
});
					