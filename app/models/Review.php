<?php

class Review extends Database {
    public function create($data) {
        $this->query("
            INSERT INTO reviews (
                user_id, movie_id, screenplay_rating, direction_rating, cinematography_rating, overall_rating, recommend, comment, main_actor
            ) VALUES (
                :user_id, :movie_id, :screenplay, :direction, :cinematography, :overall, :recommend, :comment, :main_actor
            )
        ");


        $this->bind(':user_id', $data['user_id']);
        $this->bind(':movie_id', $data['movie_id']);
        $this->bind(':screenplay', $data['screenplay']);
        $this->bind(':direction', $data['direction']);
        $this->bind(':cinematography', $data['cinematography']);
        $this->bind(':overall', $data['overall']);
        $this->bind(':recommend', $data['recommend']);
        $this->bind(':comment', $data['comment']);
        $this->bind(':main_actor', $data['main_actor']);

        return $this->execute();
    }

    public function getMovies() {
        $this->query("SELECT id, title FROM movies ORDER BY title ASC");
        return $this->resultSet();
    }
}