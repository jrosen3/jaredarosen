// Changing menu dependent on section
$(window).scroll(function() {
    
    var windowTop = Math.max($('body').scrollTop(), $('html').scrollTop());
    
    $('.pageSection').each(function (index) {
        if (windowTop > ($(this).position().top - 300)) // tweek for tolerance
        {
            $('#navigation a.current').removeClass('current');
            $('#navigation a:eq(' + index + ')').addClass('current');
        }
    });
    
}).scroll();

$(document).ready(function(){ 
    // Page section scroll
    $('#navigation a').click( function (e) {
        
        hrefString = $(this).attr('href').split('#');
        
        if ($(hrefString).size() > 1)
        {
            if ($('#' + hrefString[1]).size() > 0 )
            {
                e.preventDefault();
                $('html,body').animate({scrollTop: $('#' + hrefString[1]).offset().top}, 500); // tweek for speed
            }
        }
    });

    var lastScrollLeft = 0;
    $(window).on('scroll', function () {
        var documentScrollLeft = $(document).scrollLeft();
        if (lastScrollLeft != documentScrollLeft) {
            // $('#navigation').scrollLeft($(window).scrollLeft());
            $("#navigation").css({
                'left': -$(window).scrollLeft()
            });
            lastScrollLeft = documentScrollLeft;
        }
    });
});


