<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?=$title?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="author" content="Jude Joshua" />
        <meta name="robots" content="index, follow" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="language" content="English">
        <meta name="revisit-after" content="1 days">
        <meta name="dcterms.rightsHolder" content="Jude Joshua">
        <meta name="dcterms.rights" content="Unless otherwise indicated, this Website is our proprietary property and all source codes, databases, functionalities, softwares, audio, video, text, photographs, graphic content and designs on the Website (collectively, The 'Content') and the trademarks, service marks, and logos contained therein (the 'Marks') are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws of Nigeria, foreign jurisdictions, and international conventions." />
        <meta name="dcterms.dateCopyrighted" content="2022">
        <meta content="<?=$description?>" name="description">
        <meta content="UbyJude Josh, Josh, UbyJude, UbyJudeh, Jude, Joshua, Jude Joshua, Product design, design, ui/ux, ui, ux, ui design, ux design, ui/ux design, user experience, user interface, user-friendly" name="keywords">
        <meta id="browserColor" name="theme-color" content="#000000">
        <!--Windows Phone **-->
        <meta id="browserColor" name="msapplication-navbutton-color" content="#000000">
        <!--iOS Safari-->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <!--og tags -->
        <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?=$title?>" />
        <meta property="og:description" content="<?=$description?>" />
        <meta property="og:image" content="<?=$img?>" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="<?=$title?>" />
        <meta name="twitter:description" content="<?=$description?>" />
        <meta name="twitter:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" />
        <meta name="twitter:image" content="<?=$img?>" />
        <meta name="twitter:site" content="@_judejoshua">

        <link rel="stylesheet" href="/public/assets/css/style.css">
        <link rel="stylesheet" href="/public/assets/css/line-awesome.min.css">

        <script src="/public/assets/js/jquery-3.6.0.min.js"></script>
        <script async src="/public/assets/js/script.js"></script>
        <script>
            $(window).on("load", function() {
                // Animate loader off screen
                $(".preloader").fadeOut(2000);
                $("body").css("overflow-y", "scroll")
                $("navigation").animate({
                    "opacity": "1",
                }, 500);
                 $(".wrapper, footer, .cursor").animate({
                    "opacity": "1",
                }, 2000);
            });
        </script>

        <?php
            include 'nav.php';
        ?>
        
                
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-321KZ83579"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-321KZ83579');
        </script>
        
        
        <div class="preloader d-flex flex-justify-between d-flex-column">
            <div class="bg-coach">
            </div>
            <div>
                <div class="pulse-effect">
                    <span id="countdown"></span>
                </div>
                <h1 id="status">
                    <span class="loader-dots">
                        <span class="loader__dot">.</span>
                        <span class="loader__dot">.</span>
                        <span class="loader__dot">.</span>
                    </span>
                </h1>
            </div>
            <div class="status d-flex flex-justify-between col-100">
                <div class="status-loader">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <p><span class="copyright">&copy; Jude Joshua, 2022. All rights reserved.</span></p>
            </div>
            <!-- <div style="display: none;">
                <p class="h1">JUDE JOSHUA</p>
                <div class="loader-circles">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div> -->
        </div>

        <div id="cursor" class="cursor"></div>