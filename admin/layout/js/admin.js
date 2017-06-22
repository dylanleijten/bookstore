$(function () {
	'use strict';

	// Hide placeholder On form focus
	$('[placeholder]').focus(function () {
		$(this).attr('data-text', $(this).attr('placeholder'));
		$(this).attr('placeholder', '');
	}).blur(function () {
		$(this).attr('placeholder', $(this).attr('data-text'))
	});

	// Add Asterisk on required fields
	$('input').each(function () {
		if ($(this).attr('required')) {
			$(this).after('<span class="asterisk">*</span>');
		}
	});

	var passField = $('.password');

	// Convert password field to text field on hover
	$('.show-pass').hover(function (){

		passField.attr('type', 'text');

	}, function () {

		passField.attr('type', 'password');

	});

	// Confirmation message on Delete button
	$('.confirm').click(function () {
		return confirm('Will you delete this record?');
	});
});