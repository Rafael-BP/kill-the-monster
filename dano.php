<?php

$S_ = DIRECTORY_SEPARATOR;
require 'bd' . $S_ . 'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);
$valor = rand('0', '10');
$sql = "UPDATE monstro SET vida = (vida - :valor) WHERE id = :idMonstro";
$query = $pdo->prepare($sql);   
$query->bindParam(':valor', $valor, PDO::PARAM_INT); 
$query->bindParam(':idMonstro', $idMonstro, PDO::PARAM_INT); 
$query->execute();
echo $valor;
?>
