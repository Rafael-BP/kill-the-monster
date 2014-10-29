<?php

$S_ = DIRECTORY_SEPARATOR;
require 'bd' . $S_ . 'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM monstro WHERE id = " . $idMonstro;
$resultado = $pdo->query($sql);
$consulta = $resultado->fetch();
$array = $consulta['nome'].",".$consulta['imagem'].",".$consulta['vida'];
echo $array;
?>
