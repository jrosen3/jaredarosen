// To be called when there's a move event on the body itself:
function BlockMove(event) {
	// Tell Safari not to move the window.
	event.preventDefault();
};

function loadPic() {
	// Create an Image Search instance.
    imageSearch = new google.search.ImageSearch();
	
    // Set searchComplete as the callback function when a search is 
    // complete.  The imageSearch object will have results in it.
    imageSearch.setSearchCompleteCallback(this, searchComplete, null);

    // Find me a beautiful car.
    imageSearch.execute("Max Zacher");

    // Include the required Google branding
    // google.search.Search.getBranding('branding');
}

function getPic(){	
	imageSearch.gotoPage(getRandomArbitrary(0,8));
};

function searchComplete() {
	var num = getRandomArbitrary(0, imageSearch.results.length);
    var src = imageSearch.results[num]['url'];
    console.log(src);
    // if(UrlExists(src) == false){
    // 	getPic();
    // }
    if(true == false){
    	alert("this is never going to happen");
    }
    else {
		$("#main-pic").attr("src", src);
		$(".imgLiquidFill").imgLiquid();
        share();
	};
};

function getRandomArbitrary(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function picError() {
    $('#main-pic').attr('src', 'http://www.seriouseats.com/images/potd_pi-pie.jpg');
    $(".imgLiquidFill").imgLiquid();
    share();
}

function share() {
    var src = $('#main-pic').attr('src');
    var s = "https://twitter.com/intent/tweet?hashtags=WhoIsMaxZacher&original_referer=http%3A%2F%2Flocalhost%2Fjaredarosen%2Fmz%2F&text=Is%20this%20Max%20Zacher%3F&tw_p=tweetbutton&url="+src+"&via=JaredARosen";    
    $("#twitter").attr('href', s);
    return;
}


