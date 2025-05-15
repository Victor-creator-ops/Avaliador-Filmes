<?php

class Controller {
    // Carrega o Model (classe de acesso ao banco)
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Carrega uma View (arquivo visual com HTML)
    public function view($view, $data = []) {
        require_once '../app/views/' . $views . '.php';
    }
}