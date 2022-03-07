<?php

    $title = 'Sua posição começará em breve';

    $find = '../';

    require $find.'components/header.php';

?>


<body>
    <div class="wrapper">
        <div class="screen-wrap">
            <div class="title">
                <a href="<?= $find;?>"><img src="<?=$find?>/assets/images/logo.png" srcset="<?=$find?>/assets/images/logo.png"></a>
            </div>
            <div class="count-down row">
                <div class="begin">
                    <h2>Sua sessão irá começar em..</h2>
                </div>
                <div class="secs">
                    <img width="28" height="28" src="<?=$find?>/assets/images/loading.gif" style="display: none;">
                    <h2>3</h2>
                </div>
            </div>
            <?php require $find.'components/footer.php' ;?>
        </div>
    </div>
</body>

</html>