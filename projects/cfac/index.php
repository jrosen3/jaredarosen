<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <title>Compost for a Cause</title>
    
    <!-- <meta name="description" content="Harvard Student Art Show" />
    <meta name="keywords" content="art, harvard, hsas" />
    <link rel="shortcut icon" href="../favicon.ico"> -->

    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <!-- nav -->
    <link rel="stylesheet" type="text/css" href="css/nav.css" />
    <script src="js/nav.js"></script>

    <!-- imgliquid  -->
    <script src="js/imgLiquid-min.js"></script>

    <!-- midway -->
    <script src="js/midway.min.js"></script>
  </head>

  <body>
    <script>
      $(document).ready(function(){
        $(".imgLiquidFill-fill").imgLiquid();

        var today = new Date();
        var yyyy = today.getFullYear();
        $("#date").html(yyyy);
      });
    </script>
    <div id="all">
      <header>
        <ul id="navigation">
          <li><span class="main-title">Compost for a Cause</span></li>
          <li><a href="#section1" class="current s1">About</a></li>
          <li><a href="#section2" class="s2">The Story</a></li>
          <li><a href="#section3" class="s3">Composting Tips</a></li>
          <li><a href="#section4" class="s4">Order</a></li>
          <li><a href="#section5" class="s5">Partners</a></li>
        </ul>
      </header>

      <div id="section1" class="pageSection">
        <div class="push-down"></div>
        <div class="top-border"></div>
        <div class="section-img imgLiquidFill-fill"><img src="img/bags_test.jpg"/></div>
        <div class="botom-border"></div>
        <div class="circle"><img class="icon midway-vertical midway-horizontal" src="img/shears.png"/></div>
        <div class="circle-border"></div>
        <div class="content">
          <!-- content goes here -->
          <h1 class="title">About</h1>
          <p class="in-right">
            Lorem ipsum dolor sit amet, invidunt legendos id ius. Eu ipsum epicuri adolescens has. Eu has insolens concludaturque, ex gubergren euripidis quo. Vim quis nullam persequeris ex. Ne has zril hendrerit.
            Ex quaestio pericula repudiare qui, dicit mandamus eos no. Has at diam porro paulo, his ut prima denique. Mea ea tota regione patrioque. Agam rebum maluisset ex nam.
            Et wisi dolor eos, et admodum docendi per, an invenire tractatos cum. Alia salutandi id vix. Et doming tritani sed, no clita nominavi definitionem sed, no soleat ridens definitiones quo. Mea et mutat repudiandae. Quidam oportere periculis ad nam.
          </p>
        </div>
        <div class="clear-bottom"></div>
      </div>
      <div id="section2" class="pageSection">
        <div class="push-down"></div>
        <div class="top-border"></div>
        <div class="section-img imgLiquidFill-fill"><img src="img/compost.jpg"/></div>
        <div class="botom-border"></div>
        <div class="circle"><img class="icon midway-vertical midway-horizontal" src="img/shears.png"/></div>
        <div class="circle-border"></div>
        <div class="content">
          <!-- content goes here -->
          <h1 class="title">The Story</h1>
        </div>
        <div class="clear-bottom"></div>
      </div>
      <div id="section3" class="pageSection">
        <div class="push-down"></div>
        <div class="top-border"></div>
        <div class="section-img imgLiquidFill-fill"><img src="img/compost.jpg"/></div>
        <div class="botom-border"></div>
        <div class="circle"><img class="icon midway-vertical midway-horizontal" src="img/shears.png"/></div>
        <div class="circle-border"></div>
        <div class="content">
          <!-- content goes here -->
          <h1 class="title">Composting Tips</h1>
        </div>
        <div class="clear-bottom"></div>
      </div>
      <div id="section4" class="pageSection">
        <div class="push-down"></div>
        <div class="top-border"></div>
        <div class="section-img imgLiquidFill-fill"><img src="img/compost.jpg"/></div>
        <div class="botom-border"></div>
        <div class="circle"><img class="icon midway-vertical midway-horizontal" src="img/shears.png"/></div>
        <div class="circle-border"></div>
        <div class="content">
          <!-- content goes here -->
          <h1 class="title">Order</h1>
        </div>
        <div class="clear-bottom"></div>
      </div>
      <div id="section5" class="pageSection">
        <div class="push-down"></div>
        <div class="top-border"></div>
        <div class="section-img imgLiquidFill-fill"><img src="img/compost.jpg"/></div>
        <div class="botom-border"></div>
        <div class="circle"><img class="icon midway-vertical midway-horizontal" src="img/shears.png"/></div>
        <div class="circle-border"></div>
        <div class="content">
          <!-- content goes here -->
          <h1 class="title">Partners</h1>
        </div>
        <div class="clear-bottom"></div>
      </div>

      <footer>
        <div class="left"><p>&copy; Copyright Kevin Rosen, <span id="date"></span>. All Rights Reserved.</p></div>
        <div class="right"><p><a class="link" href="mailto:compostforacause@gmail.com">compostforacause@gmail.com</a></p></div>
      </footer>
    </div>
  </body>