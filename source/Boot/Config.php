<?php
const SITE = "X1 Clothes";
const CONF_DB_HOST = "localhost";
const CONF_DB_USER = "root";
const CONF_DB_PORT = "3306";
const CONF_DB_PASS = "";
const CONF_DB_NAME = "db-x1-clothes"; // aqui deve ser alterado para o nome do banco de dados
const CONF_URL_TEST = "http://localhost/X1-Clothes";
const CONF_URL_BASE = "http://localhost/X1-Clothes";

const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => CONF_DB_HOST,
    "port" => CONF_DB_PORT,
    "dbname" => CONF_DB_NAME,
    "username" => CONF_DB_USER,
    "passwd" => CONF_DB_PASS,
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];