<?php

$S_ = DIRECTORY_SEPARATOR;
require '..'.$S_.'bd'.$S_.'connection.php';

$pdo = connect_db();
$idMonstro =  filter_input(INPUT_GET, 'monstro', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT vida, numero_batalha FROM monstro WHERE id = " . $idMonstro;
$resultado = $pdo->query($sql);
$consulta = $resultado->fetch();
echo $consulta['vida'].','.$consulta['numero_batalha'];
?>
