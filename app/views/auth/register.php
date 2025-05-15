<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link href="<?= BASE_URL ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Cadastro de Usuário</h2>

        <?php if (!empty($data['errors'])): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($data['errors'] as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL ?>auth/create">
            <div class="form-group mb-3">
                <label>Nome:</label>
                <input type="text" class="form-control" name="name" required value="<?= $data['name'] ?? '' ?>">
            </div>
            <div class="form-group mb-3">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required value="<?= $data['email'] ?? '' ?>">
            </div>
            <div class="form-group mb-3">
                <label>Senha:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group mb-3">
                <label>Confirmar Senha:</label>
                <input type="password" class="form-control" name="confirm" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="<?= BASE_URL ?>auth" class="btn btn-secondary">Voltar ao login</a>
        </form>
    </div>
</body>
</html>
