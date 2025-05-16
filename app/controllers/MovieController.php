<?php

class MovieController extends Controller {
    public function create() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth");
            exit;
        }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $movieModel = $this->model('Movie');

        $data = [
            'title' => trim($_POST['title']),
            'director' => trim($_POST['director']),
            'genre' => trim($_POST['genre']),
            'release_year' => trim($_POST['release_year'])
        ];

        $movieModel->create($data);

        header("Location: " . BASE_URL . "review/create");
        exit;
    }

    $this->view('movies/create');
}
}