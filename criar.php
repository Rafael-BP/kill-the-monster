<!DOCTYPE html>
<html>
    <?php
        require 'sistema.php';
    ?>
    <head>
        <title>Crie um novo monstro!</title>
        <meta http-equiv="content-type" content="text/html" charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="form-criacao" name="form-criacao" method="POST">
            Nome: <input id="nome" name="nome"/><br/>
            Imagem: <input id="imagem" name="imagem"/><br/>
            Recompensa: <input id="recompensa" name="recompensa"/><br/>
            Vida: <input id="vida" name="vida"/><br/>
            <button type="submit">Salvar</button><br/>
            <a href="index.php"><button id="voltar">Voltar</button></a>
        </form>
    </body>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    criar();
} 

?>