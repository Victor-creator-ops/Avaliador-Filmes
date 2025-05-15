<?php

class AuthController extends Controller {
    // Ação padrão ao acessar /auth -> carrega o view de login
    public function index() {
        $this->view('auth/login');
    }

    // Ação ao acessar /auth/register -> carrega o view de cadastro
    public function register() {
        $this->view('auth/register');
    }

    // PROCESSA o login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = $this->model('User');
            $user = $userModel->getByEmail($email);

            if ($user && password_verify($password, $user->password)) {
                // Inicia a sessão e salva os dados
                session_start();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->name;

                // Redireciona para dashboard
                header("Location: " . BASE_URL . "dashboard");
                exit;
            } else {
                // Credenciais inválidas
                $error = "Email ou senha incorretos";
                $this->view('auth/login', ['error' => $error]);
            }
        }
    }
    // Faz logout no sistema
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "auth");
    }
}