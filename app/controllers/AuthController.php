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

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = ($_POST['password']);
            $confirm = $_POST['confirm'];


            // Validação Simples
            $errors = [];
            if (strlen($name) < 3) $errors[] = "O nome deve ter pelo menos 3 caracteres.";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email inválido.";
            if (strlen($password) < 6) $errors[] = "A senha deve ter no mínimo 6 caracteres.";
            if ($password !== $confirm) $errors[] = "As senhas não coincidem.";

            $userModel = $this->model('User');

            if ($userModel->getByEmail($email)) {
                $errors[] = "Email já cadastrado.";
            }

            if (count($errors) === 0) {
                // Tudo ok -> cria o usuário
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $userModel->register($name, $email, $passwordHash);

                // Redireciona para login
                header("Location: " . BASE_URL . "auth");
                exit;
            } else {
                // Envia erros para view
                $this->view('auth/register', ['errors' => $errors, 'name' => $name, 'email' => $email]);
            }
        }
    }
}