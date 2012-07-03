$(document).ready(function () {
	
	var userAvailable = $('.user-available');
	var emailAvailable = $('.email-available');
	var passwordReqs = 0;
	var zipCorrect = $('.zip-correct');
	
	$('#username').on('change', function (ev) {
		var username = $(this).val();
		userAvailable.attr('data-status', 'unchecked');
		
		if (username.length >= 3 && username.length <= 20) {
			var ajax = $.post('username-validation.php', {
				'username' : username
			});
			
			ajax.done(function (data) {
				if (data == 'available') {
				userAvailable.attr('data-status', 'available').html('Available');
				}
				else {
				userAvailable.attr('data-status', 'unavailable').html('Unavailable');
				}
			});
		}
		else {
			userAvailable.attr('data-status', 'unavailable').html('Unavailable');
		}
	});
	
	$('#password').on('keyup', function (ev) {
		var password = $(this).val();
		passwordReqs = 0;
		
		if (password.length > 5) {
			passwordReqs++;
			$('#passwordLength').attr('data-state', 'achieved');
		}
		
		if (password.match(/[a-z]/)) {
			passwordReqs++;
			$('#passwordLowercase').attr('data-state', 'achieved');
		}
		
		if (password.match(/[A-Z]/)) {
			passwordReqs++;
			$('#passwordUppercase').attr('data-state', 'achieved');
		}
		
		if (password.match(/\d/)) {
			passwordReqs++;
			$('#passwordNumber').attr('data-state', 'achieved');
		}
		
		if (password.match(/[^a-zA-Z0-9]/)) {
			passwordReqs++;
			$('#passwordSpecial').attr('data-state', 'achieved');
		}
	});
	
	$('#email').on('change', function (ev) {
		var email = $(this).val();
		emailAvailable.attr('data-status', 'unchecked');
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		if (email.length >= 5 && email.length <= 40 && filter.test(email)) {
			var ajax = $.post('email-validation.php', {
				'email' : email
			});
			
			ajax.done(function (data) {
				if (data == 'available') {
					emailAvailable.attr('data-status', 'available').html('Available');
				}
				else {
					emailAvailable.attr('data-status', 'unavailable').html('Unavailable');
				}
			});
		}
		else {
			emailAvailable.attr('data-status', 'invalid').html('Invalid');
		}
	});
	
	var cityCheck = false;
	$('#city').on('keyup', function (ev) {
		var city = $(this).val();
		
		if (city.match(/[a-zA-z]/)) {
			$('.city-correct').attr('data-status', 'correct');
			cityCheck = true;
		}
		if (city.match(/[0-9]/)){
			$('.city-correct').attr('data-status', 'incorrect');
			cityCheck = false;
		}
		if (city.match(/[^a-zA-z0-9\s]/)){
			$('.city-correct').attr('data-status', 'correct');
			cityCheck = false;
		}
	});
	
	$('#countryCa').on('click', function() {
		$('#countryInfo').load('canada-info.html');
	});
	
	$('#countryUs').on('click', function() {
		$('#countryInfo').load('usa-info.html');
	});
	
	$('#zip').on('change', function () {
		var zipCheck;
		
		if ($('[name="country"]:checked').val() == 'ca') {
			zipCheck = /^[a-zA-Z]\d[a-zA-Z]\s\d[a-zA-Z]\d$/;
			console.log('test');
		}
		
		if ($('[name="country"]:checked').val() == 'us') {
			zipCheck = /^\d\d\d\d\d(-\d\d\d\d)?$/;
		}
		
		if ($(this).val().match(zipCheck)) {
			zipCorrect.attr('data-status', 'valid');
		}
		else {
			zipCorrect.attr('data-status', 'invalid');
		}
	});
	
	$('form').on('submit', function (ev) {
		if (
			userAvailable.attr('data-status') == 'unchecked'
			|| userAvailable.attr('data-status') == 'unavailable'
			|| passwordReqs < 5
			|| emailAvailable.attr('data-status') == 'unchecked'
			|| emailAvailable.attr('data-status') == 'unavailable'
			|| cityCheck == false
			|| zipCorrect.attr('zip-check') == 'invalid'
			)
			{
				ev.preventDefault();
			}
		});
});