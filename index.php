<?php
require 'sistema.php';
inicio();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mate o monstro!</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            .oculto{
                visibility: hidden;
                display: none;
            }
        </style>    
    </head>
    <body>
        <div id="vitoria" class="oculto" style="color: green;">Parabens! você derrotou este terrivel monstro!</div>
        <h1 id="nome"><?php obterMonstro()['nome'] ?></h1>
        <div id="imagem"><?php obterMonstro()['imagem'] ?></div><!-- Aqui colocar tag para ir imagem do monstro -->
        <div id="vida"><?php obterMonstro()['vida'] ?></div><!-- Aqui colocar uma progress bar com a % de vida -->
        <div id="dano" style="color: red;"></div>
        <div id="danoTotal" style="color: red;"></div>
        <div id="botoesAtaque">
            <br/>      
            <button onclick="causarDano()">Atacar fisicamente!</button>
            <br/>
            <button onclick="causarDano()">Atacar a distancia!</button>
            <br/>
            <button onclick="causarDano()">Usar magia!</button> <br/>
        </div>
        <button id="voltar">Voltar</button><!-- Aqui deve voltar para o menu inicial -->
    </body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
    atualizarDados();
    danoTotal = 0;
    function atualizarDados() {
        if(parseInt($('#vida').text()) <= 0) {
            $('#botoesAtaque').addClass('oculto');
            $('#vitoria').removeClass('oculto');
        }
        $.ajax({
            type: "GET",
            url: "atualiza.php?monstro=1",
            success: function(data){
                res = data.split(",");
                $('#nome').text(res[0]);
                $('#imagem').text(res[1]);
                $('#vida').text(res[2]);                
            }
        });
        setTimeout(atualizarDados, 100);
    }
    function causarDano() {
        $.ajax({
            type: "GET",
            url: "dano.php?monstro=1",
            success: function(data){
                $('#dano').text('Dano causado no ultimo golpe ' + data);     
                danoTotal += parseInt(data);
                $('#danoTotal').text('Dano total causado: ' + danoTotal); 
            }
        });
    }
</script>
