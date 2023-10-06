<?php

if (!hasUser()) {

    header ('Location: /');

} else {

    //onter lista de livros
    $emprestimos = Emprestimo::all();
    //incluir página
    include __DIR__ . '/../../pages/emprestimos/index.php';        

}