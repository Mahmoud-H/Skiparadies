<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,300i,400,400i,500,600,700,700i">
        <link rel="stylesheet" href="css/cover-page.css">
    </head>
    <body>
        <div class="main-wrap">
            <div class=" left-section">
                <a href="winter" >
                    <img src="images/winter-cover-index.jpg" alt="winter cover">
                    <p class="absolute name">winter</p>
                </a>
            </div>
            <div class="right-section relative">
                <a href="sommer" class="absolute">
                    <img src="images/sommer-cover-index.jpg" alt="">
                    <p class="absolute name">Somer</p>
                </a>
            </div>
        </div>


        <script type="text/javascript" src="js/jquery/jquery.js"></script>
        <script>
                var $ = jQuery;

                $(document).ready(function() {

                    $( "div.right-section" )
                    .on( "mouseenter", function() {
                        $( this ).addClass("show");
                        $('.left-section').addClass('show-overlay');
                    })
                    .on( "mouseleave", function() {
                        $(this).removeClass("show");
                        $('.left-section').removeClass('show-overlay');
                    });

                    $( "div.left-section" )
                    .on( "mouseenter", function() {
                        $( 'div.right-section' ).addClass("hide");
                    })
                    .on( "mouseleave", function() {
                        $('div.right-section').removeClass("hide");
                    });



                });
        </script>
    </body>
</html>
