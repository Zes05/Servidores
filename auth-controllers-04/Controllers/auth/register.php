<?php

// verificando se há usuário conectado
// usa função definida no arquivo auth.php
if (hasUser()) {
    header('Location: /dashboard');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Location: /users/create');
}

// chegar se é register 
if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //o código de busca de usuário está
    //encapsulado na classe User (modelo)
    $model = new User(connection());    
    $data = $model->find($email);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['user'] = $name;
        header('Location: /dashboard');
    } else {

        //usa função save() presente no arquivo database.php        
        if ($model->save($name, $email, $password)) {
            $_SESSION['user'] = $name;        
            header('Location: /dashboard');
        } else {
            header('Location: /register');
        }

        
    }

}
