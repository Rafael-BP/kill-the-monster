<!DOCTYPE html>
<html>
    <?php
        require 'sistema.php';
    ?>
    <head>
        <title>Mate o monstro com seu grupo de amigos!</title>
        <meta http-equiv="content-type" content="text/html" charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/estilo.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        <div class="container-fluid">
            <div class='row-fluid clearfix'>
                <h1>
                    Lute com o Monstro
                </h1>
            </div>
            <div class='row-fluid clearfix center'>
                <a href="criar.php" class='btn btn-custom btn-lg'>Criar novo monstro </a>
            </div>
            
            <?php $listagem = listar(); ?>
            <div>
                <table class='table table-monster'>
                <?php foreach($listagem as $item) { ?>
                    <?php if ($item['vida'] > 0) { ?>
                    <tr>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['vida']; ?></td>
                        <td><a href="batalhar.php?monstro=<?php echo $item['id']; ?>"><button class='btn btn-lutar'><i class='fa fa-shield'></i> Ajudar na batalha! </button></a></td>
                    </tr>
                    <?php } ?>
                    <br/>
                <?php } ?>
                </table>
            </div>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 

    </body>
</html>
