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
        <style type="text/css">
            .oculto{
                visibility: hidden;
                display: none;
            }
        </style>    
    </head>
    <body>
        <h1 id="numero">Numero de aventureiros na batalha: <?php obterMonstro()['numero_batalha']; ?></h1>
        <input id="idMonstro" type="hidden" value="<?php echo $idMonstro; ?>"/>
        <div id="vitoria" class="oculto" style="color: green;">Parabens! você e seus amigos derrotaram este terrivel monstro!</div>
        <h1 id="nome"><?php obterMonstro()['nome']; ?></h1>
        <div id="imagem"><?php obterMonstro()['imagem']; ?></div><!-- Aqui colocar tag para ir imagem do monstro -->
        <div id="vida"><?php obterMonstro()['vida']; ?></div><!-- Aqui colocar uma progress bar com a % de vida -->
        <div id="dano" style="color: red;"></div>
        <div id="danoTotal" style="color: red;"></div>
        <div id="botoesAtaque">
            <br/>      
            <button onclick="causarDano()">Atacar fisicamente!</button>
            <button onclick="causarDano()">Atacar a distancia!</button>
            <button onclick="causarDano()">Usar magia!</button> <br/>
        </div>
        <a href="index.php"><button id="voltar">Voltar</button></a>
    </body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
    atualizarDados();
    numeroBatalha(+1);
    danoTotal = 0;
    $( window ).unload(function() {
        numeroBatalha(-1);
    });
    function atualizarDados() {
        if(parseInt($('#vida').text()) <= 0) {
            $('#botoesAtaque').addClass('oculto');
            $('#vitoria').removeClass('oculto');
        }
        $.ajax({
            type: "GET",
            url: "ajax/atualiza.php",
            data: "monstro="+$('#idMonstro').val(),
            success: function(data){
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
            data: "monstro="+$('#idMonstro').val(),
            success: function(data){
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
