<?php

class UserStats extend Database {
    // Total de avaliações do usuário
    public function countReviewsByUser($userId) {
        $this->query("SELECT COUNT (*) as total FROM reviews WHERE user_id = :uid");
        $this->bind(':uid', $userId);
        return $this->single()['total'];
    }

    // Gênero mais avaliado
    public function topGenre($userId) {
        $this->query("
            SELECT m.genre, COUNT (*) as total
            FROM reviews r
            JOIN movies m ON r.movie_id = m.id
            WHERE r.user_id = :uid
            GROUP BY m.genre
            ORDER BY total DESC
            LIMIT 1
        ");
        $this->bind(':uid', $userId);
        return $this->single()['genre'] ?? 'N/A';
    }

    // Ator mais recorrente
    public function topActor($userId) {
        $this->query("
            SELECT r.main_actor, COUNT (*) as total
            FROM reviews r
            WHERE r.user_id = :uid AND r.main_actor IS NOT NULL
            GROUP BY r.main_actor
            ORDER BY total DESC
            LIMIT 1
        ");
        $this->bind(':uid', $userId);
        return $this->single()['main_actor'] ?? 'N/A';
    }

    // Média geral de avaliação
    public function avarageRating($userId) {
        $this->query("
            SELECT AVG(overall_rating) as avg_rating
            FROM reviews
            WHERE user_id = :uid
        ");
        $this->bind(':uid', $userId);
        return round($this->single()['avg_rating'] ?? 0, 1);
    }
}