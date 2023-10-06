<?php

class Emprestimo
{

    protected static $conn;

    public function __construct(mysqli $connection){
        self::$conn = $connection;
    }

    public function find($title){
        $query = "SELECT * FROM emprestimos WHERE title=?";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function save(string $title, int $user, string $data){
        
        if ($data instanceof DateTime) {
            $formattedDate = $data->format('Y-m-d');
        } else {
            $formattedDate = DateTime::createFromFormat('Y-m-d', $data)->format('Y-m-d');
        }

        $query = 'INSERT INTO emprestimos (title, user_id, `data`) VALUES (?, ?, ?)';
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param('sis', $title, $user, $formattedDate);
        $result = $stmt->execute();

        return $result;
    }

    public static function all () {

        $db_conn = self::$conn ?? connection();

        $result = $db_conn->query('SELECT * FROM emprestimos');

        $lista_emprestimos = array();
        while ($emprestimo = $result->fetchArray()) {
            array_push($lista_emprestimos, [
                'title' => $emprestimo['title'],
                'user' => $emprestimo['user'],
                'data' => $emprestimo['data']
            ]);
        }
        return $lista_emprestimos;
    }

}