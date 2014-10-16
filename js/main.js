$(document).ready(function() {
	$('#playstop').prop('checked', true);
  	$('#playstop').change(function() {
  		var s = $('#playstop').is(':checked') ? 'img/st_sequence_slower.gif' : 'img/safety-talk-composite.jpg';
  		$('#animation').attr('src', s);
	})
});