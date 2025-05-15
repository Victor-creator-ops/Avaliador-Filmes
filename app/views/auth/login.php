<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Login</h2>
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger"><?= $data['error'] ?></div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>auth/login" method="post">
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Senha:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>
</html>