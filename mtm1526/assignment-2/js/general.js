document.getElementById('add').addEventListener('click',  function(ev) {

	ev.preventDefault();
	
	var input = document.getElementById('item');
	
	if(input.value == '')
	{
		document.getElementById('errorMsg').innerHTML = "Please add an item to the list";
	}
	
	else
	{
		document.getElementById('errorMsg').innerHTML = "";
		
		var addedItem = document.createElement('li');
		var addList = document.getElementById('list');
		
		addedItem.innerHTML = input.value;
		addList.appendChild(addedItem);
	}
	
	item.value = '';
	
}, false);

var listItem = document.getElementById('list');

listItem.addEventListener('click', function(ev) {

	if(ev.target.className == 'removed')
	{
		ev.target.className = 'readded';
	}
	
	else
	{
		ev.target.className = 'removed';
	}
	
}, false);