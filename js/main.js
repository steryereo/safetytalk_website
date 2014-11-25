$(document).ready(function() {


    var coverphotos = ["<img id='animation' src='img/st_sequence_slower.gif'> \
                    <div id='gifctrl' > \
                        <input type='checkbox' id='playstop' > \
                        <label for='playstop'><span></span></label> \
                    </div>", 

                    "<img id='lizard' src='img/2014-11-22_lizard.jpg'> \
                    <h6>11/22/2014 by Dave</h6>",
                ];


var gifctrl = function() {
	$('#playstop').prop('checked', true);
  	$('#playstop').change(function() {
  		var s = $('#playstop').is(':checked') ? 'img/st_sequence_slower.gif' : 'img/safety-talk-composite.jpg';
  		$('#animation').attr('src', s);
	});
  };

    var last = coverphotos.length-1;
    var i = last;
    $('#coverphoto').html(coverphotos[last]);
    $('#next').click(function () {
        if (i < 1) i = coverphotos.length;
        $('#coverphoto').html(coverphotos[--i]);
        if (i === 0) gifctrl(); 
    });


});