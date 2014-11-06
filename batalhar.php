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
                <h1 id="numero">Número de aventureiros na batalha: <?php echo obterMonstro()['numero_batalha']; ?></h1><br/>
            </div>
            <div class="row-fluid clearfix center">
                <div class="col-md-12">
                    <div id="div-vitoria" class="oculto">
                        <div>Parabéns! você e seus amigos derrotaram este terrível monstro!<br/> Sua recompensa é: <br/></div>        
                        <div id="recompensa"><img src="<?php echo obterMonstro()['recompensa']; ?>" alt="<?php echo obterMonstro()['recompensa']; ?>"/></div>
                        <br/><a href="index.php"><button class='btn btn-voltar' id="voltar">Voltar</button></a>
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
                    <?php
                        $vtotal = obterMonstro()['vida_max'];
                        $vatual = obterMonstro()['vida'];
                        $pvatual = ($vatual/$vtotal) * 100; 
                    ?>
                    
                    <div id="barraVida" class="progress-bar" role="progressbar" style="width: <?php echo $pvatual ?>%;">
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

<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
                    atualizarDados();
					numeroBatalha(+1);
					
					function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
					$(document).on("keydown", disableF5);
					
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
                                $('#vida').text(res[0]);
                                $('#numero').text('Número de aventureiros na batalha: ' + res[1]);
								$('#barraVida').css('width', ((res[0] / res[2])*100) + '%');
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
                                $('#dano').text('Dano causado no último golpe ' + data);
								console.log(data);
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
