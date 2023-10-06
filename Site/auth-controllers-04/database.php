<?php

function connection() : mysqli {
    $conn = mysqli_connect('127.0.0.1:3306','root','','db_migracao');
    return $conn;
}

//obtém uma conexão com o banco de dados
$connection = connection();

$connection->query("CREATE TABLE IF NOT EXISTS users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name TEXT,
    email TEXT,
    password TEXT)"
);


$connection->query("CREATE TABLE IF NOT EXISTS books(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title TEXT,
    user INTEGER,
    FOREIGN KEY(user) REFERENCES users(id))"
);

$connection->query("CREATE TABLE IF NOT EXISTS emprestimos(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title TEXT,
    user_id INTEGER,
    data DATE,
    FOREIGN KEY(user_id) REFERENCES users(id))"
);


?>  