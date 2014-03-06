$(document).ready(function(){
	setGroups();
});

$(window).resize(function(){
	
});

$(window).load(function(){
	
});

function oAuth(){
	var id = '1610';
	var url = 'https://api.venmo.com/v1/oauth/authorize?client_id='+id+'&scope=make_payments&response_type=code';
	window.location.replace(url);
};

function setGroups(){
	$("#radioC").on("click", function(){
		// alert($("#radioC").val());
		$("#directions").html("What would you like to call your group? You will get the group code to give to your frinds on the next page");
	});
	$("#radioJ").on("click", function(){
		$("#directions").html("What is the code for the group you want to Join? You need to get this from one of your frinds who is in the group already.");
	});
};