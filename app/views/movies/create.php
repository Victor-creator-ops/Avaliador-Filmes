<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2>🎬 Cadastrar Novo Filme</h2>

        <form method="POST" action="<?= BASE_URL ?>movie/create">
            <a href="<?= BASE_URL ?>movie/create" class="btn btn-outline-primary mb-3">+ Adicionar novo filme</a>

            <div class="mb-3">
                <label>Título:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Diretor:</label>
                <input type="text" name="director" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Gênero:</label>
                <input type="text" name="genre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Ano de Lançamento:</label>
                <input type="number" name="release_year" class="form-control" min="1900" max="2100" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Filme</button>
            <a href="<?= BASE_URL ?>review/create" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>