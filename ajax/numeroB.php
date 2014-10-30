<?php

$S_ = DIRECTORY_SEPARATOR;
require '..'.$S_.'bd'.$S_.'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_GET, 'numero', FILTER_SANITIZE_NUMBER_INT);
$sql = "UPDATE monstro SET numero_batalha = (numero_batalha + :valor) WHERE id = :idMonstro";
$query = $pdo->prepare($sql);   
$query->bindParam(':valor', $valor, PDO::PARAM_INT); 
$query->bindParam(':idMonstro', $idMonstro, PDO::PARAM_INT); 
$query->execute();
?>
