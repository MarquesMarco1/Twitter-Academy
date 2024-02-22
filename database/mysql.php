<?php
const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 8888;
const MYSQL_NAME = 'twitter';
const MYSQL_USER = 'MARCO';
const MYSQL_PASSWORD = 'Portugal77';

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}