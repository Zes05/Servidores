<?php 


if (!hasUser()) {
    
    header('Location: /');

} else {

    $method = $_SERVER['REQUEST_METHOD'];

    $title = $_POST['title'];
    $user = $_POST['user'];
    $data = $_POST['data'];
    $result = null;

    if ($method === 'POST' && isset($title, $user,$data)) {
        
        $book = new Book(connection());
        $emprestimo = new Emprestimo(connection());
        
        //verifica se o livro está cadastrado
        $existingBook = $book->find($title);

        if ($existingBook) {
            // Livro encontrado na tabela de livros
            $result = $emprestimo->save($_POST['title'], $_POST['user'], $_POST['data']);
            echo "Empréstimo cadastrado com sucesso.";
           
        } else {
            echo"Livro não está cadastrado! Redirecionando em ...";
            header('Refresh:3; url=/dashboard');

            if ($result) {
                header('Location: /emprestimos/index');
            }
        }

    }    

}