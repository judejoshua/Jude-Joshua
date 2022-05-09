<?php
    $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<navigation>
    <!-- <div class="logo">
        <img src="/public/includes/assets/img/logo.png" alt="logo">
    </div> -->
    <div class="nav">
        <ul class="nav-links">
            <li class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">
                <a href="/">Home</a>
            </li>
            <li class="<?=explode('/', $url)[3] == 'portfolio' ? 'active' : '' ?>">
                <a href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">Portfolio</a>
            </li>
        </ul>
    </div>
    <div class="mobile-nav-opener">
        <div class="liner"></div>
        <div class="liner"></div>
        <div class="liner" id="last-liner"></div>
    </div>
</navigation>
<div class="mobile-nav">
    <div class="mobile-nav-opener close">
        <i class="las la-arrow-right"></i>
    </div>
    <ul class="nav-links">
        <li class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">
            <a href="/">Home</a>
        </li>
        <li class="<?=explode('/', $url)[3] == 'portfolio' ? 'active' : '' ?>">
            <a href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">Portfolio</a>
        </li>
    </ul>
</div>