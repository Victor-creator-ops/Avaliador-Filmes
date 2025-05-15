# 🎬 Avaliador Pessoal de Filmes

O **Avaliador Pessoal de Filmes** é uma aplicação web que permite que usuários avaliem os filmes que assistem de forma detalhada, com base em critérios técnicos e subjetivos. O objetivo é registrar opiniões pessoais, gerar rankings individuais e oferecer uma experiência de organização e análise de preferências cinematográficas.

---

## 🧩 Funcionalidades

- 📌 Cadastro e login de usuários
- 🎥 Cadastro de filmes assistidos
- 📝 Avaliação detalhada por critérios:
  - Roteiro
  - Direção
  - Cinematografia
  - Trilha sonora
  - Atuação
- 💬 Comentário geral (opinião pessoal)
- 👍 Indicação: recomendaria ou não o filme
- 📊 Geração de um ranking pessoal com base nas avaliações
- 📚 Histórico pessoal de avaliações

---

## 🏗️ Arquitetura

Este projeto utiliza o padrão **MVC (Model-View-Controller)**, promovendo uma melhor separação de responsabilidades:

- **Model:** Responsável pela comunicação com o banco de dados e regras de negócio.
- **View:** Camadas de apresentação em HTML/CSS/Bootstrap.
- **Controller:** Gerencia as requisições do usuário, processa dados via model e envia a resposta para a view.

---

## 🖥️ Tecnologias utilizadas

- **Frontend:**

  - HTML5
  - CSS3
  - Bootstrap 5

- **Backend:**
  - PHP (com estrutura MVC)
  - MySQL (banco de dados)

---

## 🚀 Como rodar o projeto localmente

### 1. Clone o repositório

```bash
git clone https://github.com/Victor-creator-ops/Avaliador-Filmes.git
```

### 2. Configure o ambiente local

- Mova os arquivos para o diretório do seu servidor local (ex: `htdocs` do XAMPP).
- Importe o arquivo `database.sql` (fornecido no projeto) no seu MySQL.
- Configure o acesso ao banco em `/config/Database.php`.

### 3. Acesse a aplicação no navegador

```
http://localhost/avaliador-filmes/public
```

---

## 📁 Estrutura do projeto

```
/avaliador-filmes/
├── /app/
│   ├── /controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── MovieController.php
│   │   ├── ReviewController.php
│   │   └── RankingController.php
│   ├── /models/
│   │   ├── User.php
│   │   ├── Movie.php
│   │   ├── Review.php
│   │   └── Ranking.php
│   ├── /views/
│   │   ├── /auth/
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   ├── /dashboard/
│   │   │   └── index.php
│   │   ├── /movies/
│   │   │   ├── evaluate.php
│   │   │   └── list.php
│   │   ├── /ranking/
│   │   │   └── index.php
│   │   └── /partials/
│   │       ├── header.php
│   │       └── footer.php
│   ├── /core/
│   │   ├── App.php         
│   │   ├── Controller.php   
│   │   ├── Model.php      
│   │   └── Database.php    
├── /public/
│   ├── index.php        
│   ├── /css/
│   ├── /js/
│   └── /img/
├── /config/
└──   └── config.php     


```

---

## 🗂️ Melhorias futuras

- 🔐 Autenticação com tokens JWT ou OAuth
- 🌐 Integração com API externa (ex: TMDB ou OMDb) para preencher automaticamente dados dos filmes
- 📱 Versão mobile responsiva aprimorada
- 🧠 Algoritmo de recomendação baseado nas avaliações
- 🔎 Busca e filtro por categorias, gênero e nota

---

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para:

- Abrir **issues** com sugestões ou bugs
- Criar um **pull request** com melhorias no código
- Sugerir novos recursos

---

## 👤 Autor

Desenvolvido por **[Victor Gabriel Feitosa](https://github.com/Victor-creator-ops)**  
Entre em contato para dúvidas, feedback ou colaborações!
