<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title><?=$title?>Admin - Jude Joshua - Product designer, Web developer</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="author" content="Jude Joshua" />
        <meta name="robots" content="no-index, no-follow" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="language" content="English">
        <meta name="dcterms.rightsHolder" content="Jude Joshua">
        <meta name="dcterms.rights" content="Unless otherwise indicated, this Website is our proprietary property and all source codes, databases, functionalities, softwares, audio, video, text, photographs, graphic content and designs on the Website (collectively, The 'Content') and the trademarks, service marks, and logos contained therein (the 'Marks') are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws of Nigeria, foreign jurisdictions, and international conventions." />
        <meta name="dcterms.dateCopyrighted" content="2022">
        <meta id="browserColor" name="theme-color" content="#000000">
        <!--Windows Phone **-->
        <meta id="browserColor" name="msapplication-navbutton-color" content="#000000">
        <!--iOS Safari-->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        
        <link rel="apple-touch-icon" sizes="180x180" href="/public/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/public/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="/public/assets/favicon/site.webmanifest">

        <link rel="stylesheet" href="/public/assets/css/style.css">
        <link rel="stylesheet" href="/public/assets/css/line-awesome.min.css">

        <script src="/public/assets/js/jquery-3.6.0.min.js"></script>
        <script src="/public/assets/js/script.js"></script>
        <script>
            $(window).on("load", function() {
                // Animate loader off screen
                $(".preloader").fadeOut("slow");
                $("body").css("overflow-y", "scroll")
                $(".wrapper, nav").animate({
                    "opacity": "1"
                }, 2000);
            });
        </script>
        

        <?php
            include 'nav.php';
        ?>


        <div class="preloader d-flex flex-justify-between d-flex-column flex-align-center">
            <div class="empty-div"></div>
            <div class="pulse-effect">
                <p class="remmit">Jude Joshua</p>
            </div>
            <div class="status d-flex-column d-flex flex-justify-between col-100 flex-align-center">
                <div class="status-loader">
                    <div></div>
                </div>
                <p id="status" class="p6">
                    <span class="loader-dots">
                        <span class="loader__dot">.</span>
                        <span class="loader__dot">.</span>
                        <span class="loader__dot">.</span>
                    </span>
                </p>
            </div>
        </div>