<?php

header("Content-Type: text/html; charset=ISO-8859-1",true);

/*
 * Função para connectar com a base de dados
 * @return \PDO
 */
function connect_db()
{
    try
    {
        $connection = new PDO('mysql:host=localhost;dbname=sistdist', 'root', '123456789');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_PERSISTENT, true);
    }
    catch (PDOException $e)
    {
        // Proccess error
        echo 'Cannot connect to database: ' . $e->getMessage();
    }

    return $connection;
}
