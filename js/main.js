$(document).ready(function(){
	// set_mobile();
	var today = new Date();
    var yyyy = today.getFullYear();
    $("#date").html(yyyy);
	set();
});

$(window).resize(function(){
	set();
});

$(window).load(function(){
	set();
});

function set(){
	set_width();
	// set_bio();
};

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
	while(bth > (bgh + 10)) {
		$('#bio > p').css({
			'font-size': font+'px'
		});
		font = font - 1;
		bth = $('#bio > p').height();
		bgh = $('#bio').height();
	};

	while(bth < (bgh - 30)) {
		$('#bio > p').css({
			'font-size': font+'px'
		});
		font = font + 1;
		bth = $('#bio > p').height() + 5;
		bgh = $('#bio').height(); 
	};
};

function direct(where){
	switch(where)
	{
		case 'home':
			set_ga('home', 1);
			window.location.href = "/";
			break;
		case 'twitter':
			set_ga('twitter', 1);
			window.location.href = "https://twitter.com/JaredARosen";
			break;
		case 'flickr':
			set_ga('flickr', 1);
			window.location.href = "http://www.flickr.com/photos/jaredrosen/sets/";
			break;
		case 'linkedin':
			set_ga('linkedin', 1);
			window.location.href = "http://www.linkedin.com/pub/jared-rosen/53/204/94";
			break;
		case 'mail':
			set_ga('mail', 1);
			window.location.href = "mailto:jaredarosen@gmail.com";
			break;
		case 'more':
			set_ga('more', 1);
			window.location.href = "/more.php";
			break;
		default:
			window.location.href = "/";
	};
};

function set_mobile(){
	var isMobile = function() {
		//console.log("Navigator: " + navigator.userAgent);
		return /(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent);
 	};
 	if(isMobile()) {
 		window.location.href = "http://www.google.com";
	};
};

function set_ga(lab, num){
	ga('send', 'event', 'button', 'click', lab);
};



