<?php

$S_ = DIRECTORY_SEPARATOR;
require 'bd' . $S_ . 'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);

/*
 * Função criar
 * @return void
 */
function criar()
{
    global $pdo;
    $sql = "INSERT INTO monstro(nome, imagem, recompensa, vida, vida_max)
            VALUES (:nome, :imagem, :recompensa, :vida, :vidaMax)";                  
    $resultado = $pdo->prepare($sql);      
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $imagem =  filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
    $recompensa = filter_input(INPUT_POST, 'recompensa', FILTER_SANITIZE_STRING);
    $vida = filter_input(INPUT_POST, 'vida', FILTER_SANITIZE_NUMBER_INT);
    $vidaMax = filter_input(INPUT_POST, 'vida', FILTER_SANITIZE_NUMBER_INT);
    $resultado->bindParam(':nome', $nome, PDO::PARAM_STR); 
    $resultado->bindParam(':imagem', $imagem, PDO::PARAM_STR);  
    $resultado->bindParam(':recompensa', $recompensa, PDO::PARAM_STR);  
    $resultado->bindParam(':vida', $vida, PDO::PARAM_INT);       
    $resultado->bindParam(':vidaMax', $vidaMax, PDO::PARAM_INT);          
    $resultado->execute(); 
    header("location:index.php");
}

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
    $vida = obterMonstro()['vida'];
    if (($vida <= 0) || ($vida == null)) {
        header("location:index.php");
    }
}

?>
