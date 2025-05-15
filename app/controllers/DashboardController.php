<?php

class DashboardController extends Controller {
    public function index() {
        session_start();

        // Protege o acesso: só entra quem estiver logado
        if(!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth");
            exit;
        }

        $userId = $_SESSION['user_id'];
        $stats = $this->model('UserStats');

        $totalReviews = $stats->countReviewsByUser($userId);
        $topGenre = $stats->topGenre($userId);
        $topActor = $stats->topActor($userId);
        $avgRating = $stats->averangeRating($userId);

        // Exibe o dashboard
        $this->view('dashboard/index', [
            'name' => $_SESSION['user_name'],
            'totalReviews' => $totalReviews,
            'topGenre' => $topGenre,
            'topActor' => $topActor,
            'avgRating' => $avgRating
        ]);
    }
}