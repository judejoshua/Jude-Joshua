<?php
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
    <navigation>
        <div class="logo">
            <img src="/assets/img/logo.png" alt="logo">
        </div>
        <ul class="nav-links">
            <li>
                <a href="/" style="<?=explode('/', $url)[1] != '' ? '' : 'display: none' ?>">Home</a>
            </li>
            <li>
                <a href="/about" style="">About Me</a>
            </li>
            <li>
                <a href="/portfolio" style="">Past Work</a>
            </li>
            <li>
                <a href="/cv" style="">Résumé</a>
            </li>
            <li>
                <a href="/contact" style="">Contact Me</a>
            </li>
        </ul>
        <div class="mobile-nav-opener">
            <div class="liner"></div>
            <div class="liner"></div>
            <div class="liner" id="last-liner"></div>
        </div>
    </navigation>