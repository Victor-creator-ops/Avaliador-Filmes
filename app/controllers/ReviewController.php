<?php

class ReviewController extends Controller {
    public function create() {
        session_start();
        if(!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth");
            exit;
        }


        $model = $this->model('Review');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'movie_id' => $_POST['movie_id'],
                'screenplay' => $_POST['screenplay'],
                'direction' => $_POST['direction'],
                'cinematography' => $_POST['cinematography'],
                'overall' => $_POST['overall'],
                'recommend' => isset($_POST['recommend']) ? 1 : 0,
                'comment' => trim($_POST['comment']),
                'main_actor' => trim($_POST['main_actor'])
            ];


            $model->create($data);
            header("Location: " . BASE_URL . "dashboard");
            exit;
        } else {
            $movies = $model->getMovies();
            $this->view('reviews/create', ['movies' => $movies]);
        }
    }
}