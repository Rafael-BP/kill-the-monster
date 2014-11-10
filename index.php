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
        <div class="container-fluid center">
            <br/>
            <div class='row-fluid clearfix'>
                <img src="assets/img/title.png" alt=""/>
            </div><br/>
            <div class='row-fluid clearfix center'>
                <a href="criar.php" class='btn btn-custom btn-lg'>Criar novo monstro </a>
            </div><br/>
            
            <?php $listagem = listar(); ?>
            <?php if (count($listagem) > 0 ){?>
            <div class="row-fluid clearfix">
                <table class='table table-monster'>
                    <?php foreach($listagem as $item) { if ($item['vida'] != 0) { $header = true; break; } else { $header = false; } }?>
                    <?php if ($header == true) { ?>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Vida</th>
                        </tr>
                    </thead>
                    <?php } ?>
                <?php foreach($listagem as $item) { ?>
                    <?php if ($item['vida'] > 0) { ?>
                    <tr>
                        <td><img style="width: 60px;" src="<?php echo $item['imagem']; ?>" alt='<?php echo $item['imagem'] ?>'/></td>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['vida']; ?></td>
                        <td><a href="batalhar.php?monstro=<?php echo $item['id']; ?>"><button class='btn btn-lutar'><i class='fa fa-shield'></i> Ajudar na batalha! </button></a></td>
                    </tr>
                    
                    <?php } ?>
                <?php } ?>
                </table>
            </div>
            <?php } ?>
        </div>
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 

    </body>
</html>
