<?php

    $title = 'Bem vindo ao Irelp';

    $find = './';

    require $find.'components/header.php';

?>

<body>
    <div class="wrapper">
        <div class="screen-wrap">
            <div class="title">
                <a href="<?= $find;?>"><img src="<?=$find?>/assets/images/logo.png" srcset="<?=$find?>/assets/images/logo.png"></a>
            </div>
            <div class="row" id="mask">
                <a class="praticar_links" data-href="one">
                    <div class="mask">
                        <div class="mask_img">
                            <img src="<?=$find?>/assets/images/block1_curso-reiki-nivel-1.png" srcset="<?=$find?>/assets/images/block1_curso-reiki-nivel-1@2x.png">
                        </div>
                        <div class="mask_text">
                            <h4 class="meditation">Nivel I</h4>
                            <p class="sub-meditation">5:00 min por posição</p>
                        </div>
                        <div class="mask_cta">
                            <span class="btn-tertiary praticar_links" data-href="one">Praticar</span>
                        </div>
                    </div>
                </a>
                <a class="praticar_links" data-href="two">
                    <div class="mask">
                        <div class="mask_img">
                            <img src="<?=$find?>/assets/images/block1_curso-reiki-nivel-2.png" srcset="<?=$find?>/assets/images/block1_curso-reiki-nivel-2@2x.png">
                        </div>
                        <div class="mask_text">
                            <h4 class="meditation">Nivel II</h4>
                            <p class="sub-meditation">2:30 min por posição</p>
                        </div>
                        <div class="mask_cta">
                            <span class="btn-tertiary praticar_links" data-href="two">Praticar</span>
                        </div>
                    </div>
                </a>
                <a class="praticar_links" data-href="three">
                    <div class="mask">
                        <div class="mask_img">
                            <img src="<?=$find?>/assets/images/block1_curso-reiki-nivel-3.png" srcset="<?=$find?>/assets/images/block1_curso-reiki-nivel-3@2x.png">
                        </div>
                        <div class="mask_text">
                            <h4 class="meditation">Nivel III</h4>
                            <p class="sub-meditation">2:30 min por posição</p>
                        </div>
                        <div class="mask_cta">
                            <span class="btn-tertiary praticar_links" data-href="three">Praticar</span>
                        </div>
                    </div>
                </a>
            </div>
            <?php require $find.'/components/footer.php' ;?>
        </div>
        <div class="modal">
            <div class="screen-wrap">
                <div class="title">
                    <h3>Algumas Dicas</h3>
                </div>
                <div class="row">
                    <div class="notification-holder">
                        <div>
                            <div class="notification">
                                <div class="notification_img">
                                    <img src="<?=$find?>/assets/images/Group 16415.png" srcset="<?=$find?>/assets/images/Group 16415@2x.png">
                                </div>
                                <div class="notification_text">
                                    <h4>Celular no modo avião</h4>
                                    <p>Para evitar que algum outro aplicativo desvie sua atenção.</p>
                                </div>
                            </div>
                            <div class="notification">
                                <div class="notification_img">
                                    <img src="<?=$find?>/assets/images/icons8-meditation.png" srcset="<?=$find?>/assets/images/icons8-meditation@2x.png">
                                </div>
                                <div class="notification_text">
                                    <h4>Evite distrações</h4>
                                    <p>Mantenha-se concentrada(o) enquanto se autoaplica.</p>
                                </div>
                            </div>
                            <div class="notification">
                                <div class="notification_img">
                                    <img src="<?=$find?>/assets/images/icons8-tv.png" srcset="<?=$find?>/assets/images/icons8-tv@2x.png">
                                </div>
                                <div class="notification_text">
                                    <h4>Aplique enquanto assiste</h4>
                                    <p>Ligue sua TV ou computador e coloque uma série ou algo que você gosta.</p>
                                </div>
                            </div>
                            <div class="notification">
                                <div class="notification_img">
                                    <img src="<?=$find?>/assets/images/icons8-sand_timer.png" srcset="<?=$find?>/assets/images/icons8-sand_timer@2x.png">
                                </div>
                                <div class="notification_text">
                                    <h4>Aplique enquanto espera</h4>
                                    <p>Você pode se autoaplicar enquanto está aguardando em um consultório, por exemplo.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn-primary forward">Iniciar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>