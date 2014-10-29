<?php

$S_ = DIRECTORY_SEPARATOR;
require 'bd' . $S_ . 'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);

/*
* Função para obter os dados do monstro
* @return array
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
* Função para obter listagem de monstros
* @return array
*/
function listar() 
{
    global $pdo;
    $sql = "SELECT * FROM monstro";
    $resultado = $pdo->query($sql);
    return $resultado->fetchAll();
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
        header("location:index.php");
    }
}

?>