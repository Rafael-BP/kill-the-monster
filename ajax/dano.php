<?php

$S_ = DIRECTORY_SEPARATOR;
require '..'.$S_.'bd'.$S_.'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);
        
$valor = rand(0, 10);

$sql = "SELECT vida FROM monstro WHERE id = " . $idMonstro;
$resultado = $pdo->query($sql);
$vidaAtual = $resultado->fetch()['vida'];
$vidaFutura = $vidaAtual - $valor;

if ($vidaFutura >= 0) {
    $sql = "UPDATE monstro SET vida = (vida - :valor) WHERE id = :idMonstro";
    $query = $pdo->prepare($sql);   
    $query->bindParam(':valor', $valor, PDO::PARAM_INT); 
    $query->bindParam(':idMonstro', $idMonstro, PDO::PARAM_INT); 
    $query->execute();
} else {
    $sql = "UPDATE monstro SET vida = 0 WHERE id = :idMonstro";
    $valor = $vidaAtual;
    $query = $pdo->prepare($sql);   
    $query->bindParam(':idMonstro', $idMonstro, PDO::PARAM_INT); 
    $query->execute();
}
echo $valor;
?>
