<?php

/**
 * Este arquivo contém as rotas registradas para a aplicação.
 * A variável $rotas guarda pares de valores que representam
 * a rota e o script php ou arquivo html correspondente.
 * 
 * Além disso, uma função chamada rotear () é utilizada para
 * implementar o algoritmo de roteamento base da aplicação.
 */


$rotas = [
    '/' => '/pages/home.html',
    '/dashboard' => '/pages/dashboard.php',
    '/users/create' => '/pages/users/register.html',
    '/users/login' => '/pages/users/login.html',
    
    '/users/store' => '/Controllers/auth/register.php',
    '/logout' => '/Controllers/auth/logout.php',
    '/login' => '/Controllers/auth/login.php', 

    '/books/create' => '/Controllers/books/create.php',
    '/books/store' => '/Controllers/books/store.php',
    '/books/index' => '/Controllers/books/index.php',

    '/emprestimos/create' => '/Controllers/emprestimos/create.php',
    '/emprestimos/store' => '/Controllers/emprestimos/store.php',
    '/emprestimos/index' => '/Controllers/emprestimos/index.php',
];

/**
 * Função rotear utilizada para 
 * procurar os arquivos correpondentes da aplicação
 * referentes as rotas desejadas.
 */
function rotear ($uri, $rotas) {   

    if (array_key_exists($uri, $rotas)) {
        include __DIR__ . $rotas[$uri];
    } else {
        header("Location: /");
    }

}