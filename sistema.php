<?php

$S_ = DIRECTORY_SEPARATOR;
require 'bd' . $S_ . 'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);

/*
* Função para obter os dados do monstro
* @return string
*/
function obterMonstro() 
{
    global $pdo;
    global $idMonstro;
    $sql = "SELECT * FROM monstro WHERE id = " . $idMonstro;
    $resultado = $pdo->query($sql);
    return $resultado->fetch();
}

/*
 * Função para iniciar o jogo ou colocar um novo jogador no jogo atual
 * @return void
 */
function inicio()
{
    global $pdo;
    global $idMonstro;
    $vidaPadrao = 100;
    $vida = obterMonstro()['vida'];
    if (($vida <= 0) || ($vida == null)) {
        $sql = "UPDATE monstro SET vida = :valor WHERE id = :idMonstro";
        $query = $pdo->prepare($sql);                                 
        $query->bindParam(':valor', $vidaPadrao, PDO::PARAM_INT); 
        $query->bindParam(':idMonstro', $idMonstro, PDO::PARAM_INT); 
        $query->execute();
    }
}

?>