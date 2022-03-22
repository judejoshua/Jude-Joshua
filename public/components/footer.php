<div id="contextMenu" class="context-menu">
    <ul>
        <li><a href="/#" class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">Homepage</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'about' ? '#' : '/about' ?>">About me</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">See my past works</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'cv' ? '#' : '/cv' ?>">View my CV</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'contact' ? '#' : '/contact' ?>">Send me a message</a></li>
        <li><a>Other links<i class="mdi mdi-chevron-right"></i></a>
            <ul id="inner-down">
                <li><a href="#">Behance</a></li>
                <li><a href="#">Dribbble</a></li>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="results-section">
    <div class="results-section-title">
        <h2>If you're satisfied with what you've seen and think that I am a good fit, <a href="/contact">click here</a> to send a message. Or you can just go ahead and <a href="/about">learn more</a> about me.</h2>
    </div>
    <!-- <a class="btn lng" href="/contact">
        <div class="btn_bg"></div>
        <div class="btn_cont">
            <p id="text"><span>Send</span> me a message</p>
            <i class="mdi mdi-arrow-right"></i>
        </div>
    </a> -->
</div>
<footer>
    <div class="footer-top">
        <div class="contact-links">
            <a href="mailto:hello@judejoshua.me" target="_blank" class="Email">Email</a>
            <a href="" target="_blank" class="Behance">Behance</a>
            <a href="" target="_blank" class="LinkedIn">LinkedIn</a>
            <a href="" target="_blank" class="Twitter">Twitter</a>
        </div>
        <a class="to-top" href="#top">
            <h4>TO TOP</h4>
            <i class="mdi mdi-chevron-up"></i>
        </a>
    </div>
    <span class="copyright">(c) Jude Joshua, 2022. All rights reserved.</span>
</footer>