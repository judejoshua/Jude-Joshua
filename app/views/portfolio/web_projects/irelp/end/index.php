<?php

    $title = 'Parabéns!';

    $find = '../';

    require $find.'components/header.php';

?>


<body>
    <div class="end wrapper">
        <div class="screen-wrap">
            <div class="count-down row">
                <div class="notification-holder">
                    <div class="begin">
                        <h1>Parabéns!</h1>
                        <p>Você acaba de completar sua sessão de auto aplicação.</p>
                    </div>
                    <div class="notification-links">
                        <a href="https://forms.gle/A2Jc2pnkb9i2ZYaU9" class="btn-primary-2 return ">Deixar um comentário</a>
                        <a href="<?= $find;?>" class="btn-secondary return ">Fechar</a>
                    </div>
                </div>
            </div>
            <?php require $find.'components/footer.php';?>
        </div>
    </div>
</body>

</html>