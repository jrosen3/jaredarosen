<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <!-- Prevent scaling -->
    <meta name="viewport" content="user-scalable=no, width=device-width" />
    
    <!-- Eliminate url and button bars if added to home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <!-- Choose how to handle the phone status bar -->
    <meta names="apple-mobile-web-app-status-bar-style" content="default" />
    
    <!-- Specify a 320x460 start-up image. -->
    <link rel="apple-touch-startup-image" href="./startup.png" />
    
    <!-- Choose a 57x57 image for the icon -->
    <link rel="apple-touch-icon" href="./apple-touch-icon.png" />
    
    <!-- title on home screen -->
    <title>Max Zacher?</title>
    
    <!-- google -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>
      google.load('search', '1');
      var imageSearch;
    </script>

    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
    <script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="js/main.js"></script>
    
    <!-- hook -->
    <script src="js/Hook.js-master/hook.min.js"></script>
    <script src="js/Hook.js-master/mousewheel.js"></script>
    <link href="js/Hook.js-master/hook.css" rel="stylesheet">

    <!-- imgLiquid -->
    <script src="js/imgLiquid-master/js/imgLiquid-min.js"></script>

    <!-- midway -->
    <script src="js/Midway.js-master/midway.min.js"></script>

    <!-- sidr -->
    <link rel="stylesheet" href="js/sidr-package-1.2.1/stylesheets/jquery.sidr.dark.css">
    <script src="js/sidr-package-1.2.1/jquery.sidr.min.js"></script>

    <!-- touch -->
    <script src="js/jquery.touchwipe.js"></script>
  </head>

  <body ontouchmove="BlockMove(event);">
    <script>
      $(document).ready(function(){
        loadPic();

        $('#hook').hook({
          swipeDistance: 50,
          reloadPage: false,
          reloadEl: function(){
            getPic();
          }
        });

        $('.simple-menu').sidr();

        $('.men-but').on('click',function(){
          $.sidr('close');
        });

        $(".imgLiquidFill-help").imgLiquid({
          fill: false,
          verticalAlign: 'center',
          horizontalAlign: 'center'
        });

        $("#help-picture").on('click', function(){
          $("#help-picture").hide()
        })

        $("#help-btn").on('click', function(){
          $(":mobile-pagecontainer").pagecontainer("change", "#main");
          $("#help-picture").show()
        })
      });

      $(window).touchwipe({
        wipeLeft: function() {
          // Close
          $.sidr('close');
        },
        wipeRight: function() {
          // Open
          $.sidr('open');
        },
        preventDefaultEvents: false
      });

      $(document).on('pageshow', '#main', function() {
        $('#hook').hook({
            swipeDistance: 50,
            reloadPage: false,
            reloadEl: function(){
              getPic();
            }
          });
      });

      $(window).resize(function() {
        $("#help-picture").hide();
      });
    </script>
    
    <div id="main" data-role="page">
      <div id="header" data-role="header" class="ui-bar">
        <a href="#sidr" class="simple-menu ui-btn ui-icon-bars ui-btn-icon-notext ui-nodisc-icon"></a>
        <h1>Max Zacher?</h1>
      </div>

      <div class="hook" id="hook"><div class="hook-loader"><div class="hook-spinner"></div></div></div>
      
      <div id="main-contnet" data-role="content">
        <div class="imgLiquidFill-help midway-horizontal midway-vertical" id="help-picture">
          <img id="help-pic" src="img/help.png"/>
        </div>

        <div class="imgLiquidFill midway-horizontal" id="picture">
          <img id="main-pic" src="" onerror="picError();"/>
        </div>

        <a id="twitter" class="midway-horizontal" target="_blank"><img src="img/twitter_logo_blue.png" style="margin-top:0px;" width="25px"/>&nbsp;&nbsp;&nbsp;Tweet</a>
      </div>
    </div>

    <div id="technical" data-role="page">
      <div id="header" data-role="header" class="ui-bar">
        <a href="#sidr" class="simple-menu ui-btn ui-icon-bars ui-btn-icon-notext ui-nodisc-icon"></a>
        <h1>Max Zacher?</h1>
      </div>
      <div id="content" data-role="content">
        <p class="text">
          Powered by
            <a href="http://jquery.com/" target="_blank">jQuery</a>,
            <a href="http://shipp.co/" target="_blank">Shipp</a>,
            <a href="https://github.com/karacas/imgLiquid" target="_blank">imgLiquid</a>, and
            <a href="http://www.berriart.com/sidr/" target="_blank">Sidr</a>.
            </br></br>
            All pictures from <a href="http://www.google.com/imghp" target="_blank">Google</a>.
          </p>
      </div>
    </div>

    <div id="about" data-role="page">
      <div id="header" data-role="header" class="ui-bar">
        <a href="#sidr" class="simple-menu ui-btn ui-icon-bars ui-btn-icon-notext ui-nodisc-icon"></a>
        <h1>Max Zacher?</h1>
      </div>
      <div id="content" data-role="content">
        <p><center>I told you so!</center></p>
      </div>
    </div>
    
    <div id="sidr">
      <ul>
        <li><a class="men-but" href="#main">Home</a></li>
        <!-- <li><a class="men-but" id="help-btn">Help</a></li> -->
        <li><a class="men-but" href="#about">About</a></li>
        <li><a class="men-but" href="#technical">Technical</a></li>
        <li><a class="men-but" href="https://twitter.com/JaredARosen" target="_blank">Created by Jared Rosen</a></li>
      </ul>
    </div>
  </body>
</html>


