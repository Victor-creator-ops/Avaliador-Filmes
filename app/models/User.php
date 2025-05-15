<?php

class User extends Database {
    // Busca usuário por email
    public function getByEmail($email) {
        $this->query("SELECT * FROM users WHERE email = :email");
        $this->bind(":email", $email);
        return $this->single();
    }


    // Cadastra novo usuário
    public function register($name, $email, $passwordHash) {
        $this->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $this->bind(":name", $name);
        $this->bind(":email", $email);
        $this->bind(":password", $passwordHash);
        return $this->execute();
    }
}