<?php

class App {
    // Controller, método e parâmetros padrão
    protected $controller = 'AuthController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // Verifica se o Controller existe
        if(isset($url[0]) && file_exists('../app/controllers' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller'; // Ex: Auth -> AuthController
            unset($url[0]);
        }
        
        // Carrega o arquivo do Controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        // Verifica se o método chamado na URL existe
        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Pega os parâmetros restantes da URL
        $this -> params = $url ? array_values($url) : [];

        // Chama o método do Controller com os parâmetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Quebra a URL em partes para uso em roteamento
    protected function parseURL() {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}