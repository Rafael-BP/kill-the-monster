<?php
require 'sistema.php';
inicio();
causarDano(5);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mate o monstro!</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1 id="nome"><?php obterMonstro()['nome'] ?></h1>
        <div id="imagem"><?php obterMonstro()['imagem'] ?></div><!-- Aqui colocar tag para ir imagem do monstro -->
        <div id="vida"><?php obterMonstro()['vida'] ?></div><!-- Aqui colocar uma progress bar com a % de vida -->
    </body>
</html>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
    atualizarDados();
    function atualizarDados() {
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
        setTimeout(atualizarDados, 500);
    }
</script>
