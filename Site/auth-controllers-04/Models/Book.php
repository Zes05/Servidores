<?php

class Book 
{
    protected static $conn;

    public function __construct(mysqli $connection)
    {
        self::$conn = $connection;
    }

    public function find($title){
        $query = "SELECT * FROM books WHERE title=?";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function save (string $title, int $user) {
        $query = 'INSERT INTO books (title, user) VALUES (?, ?)';
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param('si', $title, $user);
        $result = $stmt->execute();
        return $result;
    }

    public static function all () {
        $db_conn = self::$conn ?? connection();

        $result = $db_conn->query('SELECT * FROM books');

        $book_list = array();
        while ($book = $result->fetch_assoc()) {
            array_push($book_list, [
                'title' => $book['title'],
                'user' => $book['user'],
            ]);
        }
        return $book_list;
    }

    


}
