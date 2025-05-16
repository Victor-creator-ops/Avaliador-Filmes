<?php

class Movie extends Database {
    public function create($data) {
        $this->query("
            INSERT INTO movies (title, director, genre, release_year) VALUES (:title, :director, :genre, :release_year)
        ");

        $this->bind(':title', $data['title']);
        $this->bind(':director', $data['director']);
        $this->bind(':genre', $data['genre']);
        $this->bind(':release_year', $data['release_year']);

        return $this->execute();
    }
}