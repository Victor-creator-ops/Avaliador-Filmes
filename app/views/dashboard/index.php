<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Olá, <?= htmlspecialchars($data['name']) ?>! 🎬</h2>
        <p class="lead">Aqui estão suas estatísticas cinéfilas:</p>

        <div class="row g-4 mt-4">
            <div class="col-md-3">
                <div class="card border-success shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">🎥 Filmes Avaliados</h5>
                        <p class="display-6"><?= $data['totalReviews'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-primary shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">🎭 Gênero Favorito</h5>
                        <p class="display-6"><?= htmlspecialchars($data['topGenre']) ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-warning shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">⭐ Média de Notas</h5>
                        <p class="display-6"><?= $data['avgRating'] ?>/10</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-info shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">👤 Ator Mais Visto</h5>
                        <p class="display-6"><?= htmlspecialchars($data['topActor']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <a href="<?= BASE_URL ?>auth/logout" class="btn btn-danger mt-4">Sair</a>
    </div>
</body>
</html>