<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2>📽️ Avaliar Filmes</h2>

        <form action="<?= BASE_URL ?>review/create" method="post">
            <div class="mb-3">
                <label for="movie_id" class="form-label">Filme:</label>
                <select name="movie_id" class="form-select" required>
                    <option value="">Selecione um filme</option>
                    <?php foreach ($data['movies'] as $movie): ?>
                        <option value="<?= $movie['id'] ?>"><?= htmlspecialchars($movie['title']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="">Roteiro:</label>
                    <input type="number" name="screenplay" class="form-control" min="1" max="10" required>
                </div>

                <div class="col">
                    <label for="">Direção:</label>
                    <input type="number" name="direction" class="form-control" min="1" max="10" required>
                </div>

                <div class="col">
                    <label for="">Cinematografia:</label>
                    <input type="number" name="cinematography" class="form-control" min="1" max="10" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="">Ator Principal:</label>
                <input type="text" name="main_actor" class="form-control">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="recommend" class="form-check-input" id="recommend">
                <label for="recommend" class="form-check-label">Recomendo este filme.</label>
            </div>

            <div class="mb-3">
                <label for="">Comentário:</label>
                <textarea name="comment" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Salvar Avaliação</button>
            <a href="<?= BASE_URL ?>dashboard" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>

</html>