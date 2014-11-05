<!DOCTYPE html>
<html>
    <?php
    require 'sistema.php';
    inicio();
    ?>
    <head>
        <title>Mate o monstro com seu grupo de amigos!</title>
        <meta http-equiv="content-type" content="text/html" charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/estilo.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            .oculto{
                visibility: hidden;
                display: none;
            }
        </style>    
    </head>
    <body>
        <div class="container-fluid">
            <input id="idMonstro" type="hidden" value="<?php echo $idMonstro; ?>"/>
            <div class="row-fluid clearfix">
                <h1 id="numero">Numero de aventureiros na batalha: <?php echo obterMonstro()['numero_batalha']; ?></h1><br/>
            </div>
            <div class="row-fluid clearfix">
                <div class="col-md-12">
                    <div id="div-vitoria" class="oculto">
                        <div id="vitoria" style="color: green;">Parabens! você e seus amigos derrotaram este terrível monstro!<br/> Sua recompensa é: <br/></div>        
                        <div id="recompensa"><?php echo obterMonstro()['recompensa']; ?></div><!-- Aqui colocar tag para ir imagem da recompensa -->
                    </div>
                </div>
            </div>
            <div class="row-fluid clearfix center">
                <h1 id="nome"><?php echo obterMonstro()['nome'] ?></h1>
            </div>
            <div class="row-fluid clearfix center">
                <div id="imagem">
                    <img src="<?php echo obterMonstro()['imagem']; ?>" alt='<?php echo obterMonstro()['nome'] ?>'/>
                </div><!-- Aqui colocar tag para ir imagem do monstro -->
            </div><br/>
            <div class='row-fluid clearfix center'>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%;">
                        <span id='vida'><?php echo obterMonstro()['vida']; ?></span>
                    </div>
                </div>
            </div>
            <div class='row-fluid'>
                <div class='dano'>
                    <div id="dano"></div>
                    <div id="danoTotal"></div>
                </div>
            </div>
            <div class='row-fluid center'>
                <div id="botoesAtaque">
                    <button class='btn btn-ataque' onclick="causarDano()"><i class="fa fa-gavel"></i>Atacar fisicamente!</button>
                    <button class='btn btn-ataque' onclick="causarDano()"><i class="fa fa-rocket"></i> Atacar a distância!</button>
                    <button class='btn btn-ataque' onclick="causarDano()"><i class="fa fa-magic"></i>Usar magia!</button> <br/>
                </div>
            </div><br/>
            <div class="row-fluid clearfix">
                <a href="index.php"><button class='btn btn-voltar' id="voltar">Voltar</button></a>
            </div>            
        </div>
    </body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
                    atualizarDados();
                    numeroBatalha(+1);
                    danoTotal = 0;
                    $(window).unload(function() {
                        numeroBatalha(-1);
                    });
                    function atualizarDados() {
                        if (parseInt($('#vida').text()) <= 0) {
                            $('#botoesAtaque').addClass('oculto');
                            $('#div-vitoria').removeClass('oculto');
                        }
                        $.ajax({
                            type: "GET",
                            url: "ajax/atualiza.php",
                            data: "monstro=" + $('#idMonstro').val(),
                            success: function(data) {
                                res = data.split(',');
                                console.log(res);
                                $('#vida').text(res[0]);
                                $('#numero').text('Numero de aventureiros na batalha: ' + res[1]);
                            }
                        });
                        setTimeout(atualizarDados, 300);
                    }
                    function causarDano() {
                        $.ajax({
                            type: "GET",
                            url: "ajax/dano.php",
                            data: "monstro=" + $('#idMonstro').val(),
                            success: function(data) {
                                $('#dano').text('Dano causado no ultimo golpe ' + data);
                                danoTotal += parseInt(data);
                                $('#danoTotal').text('Dano total causado: ' + danoTotal);
                            }
                        });
                    }
                    function numeroBatalha(valor) {
                        $.ajax({
                            type: "GET",
                            url: "ajax/numeroB.php",
                            data: {monstro: $('#idMonstro').val(), numero: valor}
                        });
                    }
</script>
