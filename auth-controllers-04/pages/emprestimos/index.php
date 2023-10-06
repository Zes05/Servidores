<?php 

if (!hasUser()) {
    header ('Location: /');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Emprestimos</h1>
    <a href="/emprestimos/create">Adicionar</a>

    <ul>
    <?php foreach($emprestimos as $emprestimo) { ?>
        <li>
            <?= $emprestimo['title'] ?>
            <?= $emprestimo['data']?>
        </li>
    <?php } ?>
    </ul>
    
</body>
</html>