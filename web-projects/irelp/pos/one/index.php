<?php

    $title = 'Posição - 1';

    $find = '../../';

    require $find.'components/header.php';

?>


<body>
    <div class="Posição wrapper">
        <div class="screen-wrap">
            <div class="title">
                <a href="<?= $find;?>"><img src="<?= $find;?>/assets/images/logo.png"></a>
            </div>
            <div class="progress-bar">
                <div class="progress-bar-indicator"></div>
            </div>
            <div class="row">
                <div class="begin ">
                    <img src="<?= $find;?>/assets/images/1.png">
                </div>
                <div class="secs">
                    <p>Posição <span>1</span></p>
                    <div class="description-container">
                        <span id="p1" class="desc" >Trabalha as glândulas Pineal, Pituitária/Hipófise</span>
                        <span id="p2" class="desc" style="display:none;">Estimula o cérebro, pensamentos e memória</span>
                        <span id="p3" class="desc" style="display:none;">Trabalha a medula, o cérebro é equilibra o peso</span>
                        <span id="p4" class="desc" style="display:none;">Equilibra pressão alta/baixa, circulação e metabolismo</span>
                        <span id="p5" class="desc" style="display:none;">Auto confiança, serenidade, felicidade e harmonia</span>
                        <span id="p6" class="desc" style="display:none;">Sentimento de doar e receber afeto</span>
                        <span id="p7" class="desc" style="display:none;">Aumenta a auto confiança, força e aceitação</span>
                        <span id="p8" class="desc" style="display:none;">Vícios, ansiedade, nervosismo e pânico</span>
                        <span id="p9" class="desc" style="display:none;">Confiança, centralização e alergias respiratórias</span>
                        <span id="p10" class="desc" style="display:none;">Reduz estresse, ressentimentos e de medo de mudanças</span>
                        <span id="p11" class="desc" style="display:none;">Aumenta a auto confiança e reduz conflitos externos</span>
                        <span id="p12" class="desc" style="display:none;">Conecta o corpo físico, etérico e emocional</span>
                        <span id="p13" class="desc" style="display:none;">Dorso dos pés - aumenta a capacidade de estar e pertencer a Terra Sola dos pés- Conecta o corpo físico, etérico e emocional</span>
                    </div>
                    <h2 id="disabled" class="timekeep">5:00</h2>
                </div>
                <div class="controls">
                    <div class="play-pause" style="display: none;">
                        <img id="pause" width="36" height="36" src="<?= $find;?>/assets/images/pause.png">
                        <img id="play" width="36" height="36" src="<?= $find;?>/assets/images/play.png">
                    </div>
                    <div class="sound-controls">
                        <img id="sound-active" width="36" height="36" src="<?= $find;?>/assets/images/sound-active.png">
                        <img id="sound-muted" width="36" height="36" src="<?= $find;?>/assets/images/sound-muted.png" style="display: none;">
                    </div>
                    <a class="close" style="display: none;">
                        <div></div>
                        <div></div>
                    </a>
                </div>
                <a id="begin-position" class="btn-primary forward ">Iniciar</a>
            </div>
            <?php require $find.'components/footer.php' ;?>
        </div>
        <div class="modal">
            <div class="wrapper">
                <div class="screen-wrap">
                    <div class="count-down row">
                        <div class="begin">
                            <h2>Deseja encerrar sua sessão?</h2>
                        </div>
                        <div class="notification-links">
                            <a href="<?= $find;?>" class="btn-primary close-return">Sim</a>
                            <a class="btn-secondary return">Não</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>