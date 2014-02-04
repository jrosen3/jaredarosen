function pattern() {
	var f = $("#first").width();
	var m = $("#middle").width() - (0.1 * $('#bodyContent').width());
	var l = $("#last").width();
	
	$("#pFirst").css({
		"width" : f+"px"
	});

	$("#pMiddle").css({
		"width" : m+"px"
	});

	$("#pLast").css({
		"width" : l+"px"
	});

	var left = $("#first").position()['left'];
	var w = f + m + l + (0.1 * $('#bodyContent').width())
	$("#name").css({
		"width" : w+"px",
		"left" : left+"px",
	});
}

function pAnnimate() {
	$('#first').on('mouseenter', function() {
		var n = 0
		this.iid = setInterval(function() {
		$("#pFirst").css({
			'background-position' : n+'px 0px'
		});
		n += 2.0;
	}, 25);
	}).on('mouseleave', function(){
		this.iid && clearInterval(this.iid);
		$("#pFirst").css({
			'background-position' : '0px 0px'
		});
	});

	$('#middle').on('mouseenter', function() {
		var n = 0
		this.iid = setInterval(function() {
		$("#pMiddle").css({
			'background-position' : n+'px 0px'
		});
		n += 1.5;
	}, 25);
	}).on('mouseleave', function(){
		this.iid && clearInterval(this.iid);
		$("#pMiddle").css({
			'background-position' : '0px 0px'
		});
	});

	$('#last').on('mouseenter', function() {
		var n = 0
		this.iid = setInterval(function() {
		$("#pLast").css({
			'background-position' : n+'px 0px'
		});
		n += 2.5;
	}, 25);
	}).on('mouseleave', function(){
		this.iid && clearInterval(this.iid);
		$("#pLast").css({
			'background-position' : '0px 0px'
		});
	});
}