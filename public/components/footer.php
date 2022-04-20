<div id="contextMenu" class="context-menu">
    <ul>
        <li><a href="/#" class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">Homepage</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'about' ? '#' : '/about' ?>">About me</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">See my past works</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'cv' ? '#' : '/cv' ?>">View my CV</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'contact' ? '#' : '/contact' ?>">Send me a message</a></li>
        <li><a>Other links<i class="las la-angle-right"></i></a>
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
        <?php
            if(explode('/', $url)[3] == 'contact')
            {
                echo '
                    <p class="p3">If you\'re not fully convinced of my strength, why not have a <a href="/portfolio">look</a> at the projects that I have helped to design and build in the past.</p>
                ';
            }else if(explode('/', $url)[3] == 'portfolio')
            { 
                echo '
                    <p class="p3">Your users desire a stress-free experience with your digital products and I can help you provide them with maximum satisfaction.</p>
                    <a class="btn mdn" href="/contact">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>Find</span> out how</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                ';
            }else{
                echo '
                    <p class="p3">If you\'re satisfied with what you\'ve seen and think that I am a good fit for your project, <a href="/contact">click here</a> to send a message. Or you can just go ahead and <a href="/about">learn more</a> about me.</p>
                ';
            }
        ?>
    </div>
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
            <p class="h4">TO TOP</p>
            <i class="las la-angle-up"></i>
        </a>
    </div>
    <span class="copyright">&copy; Jude Joshua, 2022. All rights reserved.</span>
</footer>