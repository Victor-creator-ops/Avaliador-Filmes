<?php

class DashboardController extends Controller {
    public function index() {
        session_start();

        // Protege o acesso: só entra quem estiver logado
        if(!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth");
            exit;
        }

        // Exibe o dashboard
        $this->view('dashboard/index', [
            'name' => $_SESSION['user_name']
        ]);
    }
}