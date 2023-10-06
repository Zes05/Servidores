<?php 

if (!hasUser()) {
    
    header('Location: /');

} else {

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        include __DIR__ . '/../../pages/emprestimos/create.html';
    }
}