<?php

class User extends Database {
    // Busca usuário por email
    public function getByEmail($email) {
        $this->query("SELECT * FROM users WHERE email = :email");
        $this->bind(":email", $email);
        return $this->single();
    }
}