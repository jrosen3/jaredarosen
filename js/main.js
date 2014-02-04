$(document).ready(function(){
	set_width();
	set_bio();

	var today = new Date();
    var yyyy = today.getFullYear();
    $("#date").html(yyyy);
});

$(window).resize(function(){
	set_width();
	set_bio();
});

function set_width(){
	var w = $('#container').width();
	$('.grid').css({
		'height': w+'px'
	});

	$('#name, #more').css({
		'height': (w/8)+'px',
		'width': w+'px',
		'line-height': (w/8)+'px'
	});

	$('#footer').css({
		'height': (w/8)+'px',
		'width': w+'px',
		'line-height': ((w/8)/2)+'px',
		'border-bottom': '0px'
	});

	$('#bio').css({
		'height': (w/2)+'px',
		'margin-top': ((w/8)+3)+'px'
	});

	var sh = $(window).height() - ((w/8)*2) - 6;
	$('#stuff').css({
		'min-height': sh+'px',
		'margin-top': ((w/8)+3)+'px'
	});

	$('#comingsoon').css({
		'height': sh+'px',
		'margin-top': ((w/8)+3)+'px',
		'line-height': sh+'px'
	});

	var ss = (w/2) - 1.5;
	$('.social').css({
		'width': ss+'px',
		'height': ss+'px',
		'float': 'left',
		'background-size': '50%',
		'background-repeat': 'no-repeat',
		'background-position': 'center',
	});
};

function set_bio(){
	var bth = $('#bio > p').height();
	var bgh = $('#bio').height();
	var font = parseInt($('#bio > p').css("font-size"));
	while(bth > (bgh + 20)) {
		$('#bio > p').css({
			'font-size': font+'px'
		});
		font = font - 1;
		bth = $('#bio > p').height();
		bgh = $('#bio').height();
	};

	while(bth < (bgh - 20)) {
		$('#bio > p').css({
			'font-size': font+'px'
		});
		font = font + 1;
		bth = $('#bio > p').height();
		bgh = $('#bio').height();
	};
};

function direct(where){
	switch(where)
	{
		case 'home':
			window.location.href = "../jaredarosen/";
			break;
		case 'twitter':
			window.location.href = "https://twitter.com/JaredARosen";
			break;
		case 'flickr':
			window.location.href = "../jaredarosen/comingsoon.php";
			break;
		case 'linkedin':
			window.location.href = "http://www.linkedin.com/pub/jared-rosen/53/204/94";
			break;
		case 'mail':
			window.location.href = "mailto:jaredarosen@gmail.com";
			break;
		case 'more':
			window.location.href = "../jaredarosen/more.php";
			break;
		default:
			window.location.href = "../jaredarosen/";
	};
};




