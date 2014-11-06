<!DOCTYPE html>
<html>
    <?php
    require 'sistema.php';
    ?>
    <head>
        <title>Crie um novo monstro!</title>
        <meta http-equiv="content-type" content="text/html" charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row-fluid clearfix'>
                <div class='row-fluid clearfix'>
                    <h1>
                        Lute com o Monstro
                    </h1>
                </div> 
                <form class="form-horizontal" id="form-criacao" name="form-criacao" method="POST">
                    <div class="form-group">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <select class="form-control" id="sugestoes">
                                <option value="-1">Sugestões: </option>
                                <option value="1">Blue Hat</option>
                                <option value="2">Dragon</option>
                                <option value="3">Radioactive Jelly</option>
                                <option value="4">Yellow Thing</option>
                            </select>
                        </div>
                    </div>
                    <div class=form-group>
                        <label class='col-md-2 control-label'>Nome: </label>
                        <div class='col-md-10'>
                            <input required class='form-control' id="nome" name="nome"/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-md-2 control-label'>Imagem:</label>
                        <div class='col-md-10'>
                             <input required class='form-control' id="imagem" name="imagem"/><br/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-md-2 control-label'>Recompensa:</label>
                        <div class='col-md-10'>
                             <input required class='form-control' id="recompensa" name="recompensa"/><br/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-md-2 control-label'>Vida:</label>
                        <div class='col-md-10'>
                             <input required class="form-control" id="vida" name="vida"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <button class="btn btn-salvar" type="submit">Salvar</button>
                            <a href="index.php"><button type="button" class="btn btn-voltar" id="voltar">Voltar</button></a>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>        
    </body>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="assets/js/selector.js"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    criar();
}
?>