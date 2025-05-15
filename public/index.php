<?php

// Importa as configurações globais do sistema (como conexão com banco, constantes, etc)
require_once '../config/config.php'; 

// Importa as classes principais do núcleo do sistema MVC
require_once '../app/core/App.php'; // Classe de roteamento
require_once '../app/core/Controller.php'; // Classe base dos Controllers
require_once '../app/core/Database.php'; // Classe de conexão e execução das queries no banco

// Inicializa o sistema chamando a classe principal App
$app = new App();