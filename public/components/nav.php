<?php
    $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<navigation class="d-flex flex-justify-between flex-align-center">
    <a href="/">
        <div class="logo">
            <p class="remmit">Jude Joshua</p>
        </div>
    </a>
    <div class="nav">
        <ul class="nav-links">
            <li class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">
                <a class="p4" href="/">Home</a>
            </li>
            <li class="<?=explode('/', $url)[3] == 'about' ? 'active' : '' ?>">
                <a class="p4" href="<?=explode('/', $url)[3] == 'about' ? '#' : '/about' ?>">About</a>
            </li>
            <li class="<?=explode('/', $url)[3] == 'portfolio' ? 'active' : '' ?>">
                <a class="p4" href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">Work</a>
            </li>
            <li class="<?=explode('/', $url)[3] == 'cv' ? 'active' : '' ?>">
                <a class="p4" href="<?=explode('/', $url)[3] == 'cv' ? '#' : '/cv' ?>">CV</a>
            </li>
            <li class="<?=explode('/', $url)[3] == 'contact' ? 'active' : '' ?>">
                <a class="p4" href="<?=explode('/', $url)[3] == 'contact' ? '#' : '/contact' ?>">Contact</a>
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
            <a class="p4" href="/">Home</a>
        </li>
        <li class="<?=explode('/', $url)[3] == 'about' ? 'active' : '' ?>">
            <a class="p4" href="<?=explode('/', $url)[3] == 'about' ? '#' : '/about' ?>">About</a>
        </li>
        <li class="<?=explode('/', $url)[3] == 'portfolio' ? 'active' : '' ?>">
            <a class="p4" href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">Work</a>
        </li>
        <li class="<?=explode('/', $url)[3] == 'cv' ? 'active' : '' ?>">
            <a class="p4" href="<?=explode('/', $url)[3] == 'cv' ? '#' : '/cv' ?>">CV</a>
        </li>
        <li class="<?=explode('/', $url)[3] == 'contact' ? 'active' : '' ?>">
            <a class="p4" href="<?=explode('/', $url)[3] == 'contact' ? '#' : '/contact' ?>">Contact</a>
        </li>
    </ul>
</div>
