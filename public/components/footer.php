<div id="contextMenu" class="context-menu">
    <ul>
        <li><a href="/#" class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">Homepage</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'about' ? '#' : '/about' ?>">About me</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">See my past works</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'cv' ? '#' : '/cv' ?>">View my CV</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'contact' ? '#' : '/contact' ?>">Send me a message</a></li>
        <li><a>Social Media<i class="las la-angle-right"></i></a>
            <ul id="inner-down">
                <li><a rel="nofollow" href="https://www.linkedin.com/in/judejoshua/" target="_blank">LinkedIn</a></li>
                <a rel="nofollow" href="https://medium.com/@judejoshua" target="_blank">Medium</a>
                <!-- <li><a rel="nofollow" href="https://www.behance.net/jude_joshua" target="_blank">Behance</a></li> -->
                <li><a rel="nofollow" href="https://twitter.com/_judejoshua" target="_blank">Twitter</a></li>
                <li><a rel="nofollow" href="https://dribbble.com/JudeJoshua" target="_blank">Dribbble</a></li>
                <li><a rel="nofollow" href="https://www.youtube.com/channel/UCckcpzjMMEak8ef4AIjQYDg/" target="_blank">Youtube</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="results-section">
    <div class="results-section-title">
        <?php
            if(explode('/', $url)[3] == 'cv')
            {
                echo '
                   <a class="btn four dwnld-btn" href="/public/assets/files/Jude--Joshua--resume.pdf" download="Resume||Jude-Joshua.pdf">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>Save</span> my cv</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                ';
            }else if(explode('/', $url)[3] == 'portfolio' || explode('/', $url)[3] == 'about')
            {
                echo '
                    <p class="p4">Your users desire a stress-free experience with your digital product. I can help you provide this with maximum satisfaction.</p>
                    <a class="btn four mdn" href="/contact">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>Send</span> a message</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                ';
            }else{
                echo '
                    <p class="p4">If you are satisfied with what you\'ve seen and would love to discuss your project with me, <a href="/contact">send me a message</a> or <a href="/about">click here</a> to know about more my design journey.</p>
                ';
            }
        ?>
    </div>
</div>
<footer>
    <div class="footer-top d-flex flex-justify-between">
        <div class="contact-links">
            <a rel="nofollow" href="https://www.linkedin.com/in/judejoshua/" target="_blank" class="LinkedIn">LinkedIn</a>
            <a rel="nofollow" href="https://medium.com/@judejoshua" target="_blank" class="Medium">Medium</a>
            <!-- <a rel="nofollow" href="https://www.behance.net/jude_joshua" target="_blank" class="Behance">Behance</a> -->
            <a rel="nofollow" href="https://twitter.com/_judejoshua" target="_blank" class="Twitter">Twitter</a>
            <a rel="nofollow" href="https://dribbble.com/JudeJoshua" target="_blank" class="Dribbble">Dribbble</a>
            <a rel="nofollow" href="https://www.youtube.com/channel/UCckcpzjMMEak8ef4AIjQYDg/" target="_blank" class="Youtube">Youtube</a>
        </div>
        <a class="to-top" href="#top">
            <p class="p5">SCROLL UP</p>
            <i class="las la-angle-up"></i>
        </a>
    </div>
    <span class="copyright p6"><i class="las la-copyright"></i> Jude Joshua, 2022. All rights reserved.</span>
</footer>
