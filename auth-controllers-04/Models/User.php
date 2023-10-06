<?php

class User
{

    protected static $conn; //conexão com o banco de dados

    public function __construct(mysqli $connection){
        self::$conn = $connection;
    }

    public function find($email){
        $query = "SELECT * FROM users WHERE email=?";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function save(string $name, string $email, string $password){
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = self::$conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $stmt->bind_param("sss", $name, $email, $hashedPassword); 
        $result = $stmt->execute();
        return $result;
    }

  
        


}
