<div id="contextMenu" class="context-menu">
    <ul>
        <li><a href="/#" class="<?=explode('/', $url)[3] == '' ? 'hidden' : '' ?>">Homepage</a></li>
        <li><a href="<?=explode('/', $url)[3] == 'portfolio' ? '#' : '/portfolio' ?>">Portfolio</a></li>
    </ul>
</div>
<footer>
    <span class="copyright">&copy; Jude Joshua, 2022. All rights reserved.</span>
</footer>