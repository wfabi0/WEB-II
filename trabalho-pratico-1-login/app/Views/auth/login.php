<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body class="page-body">
    <div class="main-container">
        <h1>Login</h1>

        <form action="<?= base_url("do-login") ?>" method="post">
            <input
                type="email"
                class="form-input"
                placeholder="Digite seu e-mail"
                name="email"
                required>


            <input
                type="password"
                class="form-input"
                placeholder="Digite sua senha"
                name="password"
                required>

            <?php if (session()->getFlashdata('error')): ?>
                <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <button type="submit" class="primary-button">
                Entrar
            </button>
        </form>
    </div>
</body>

</html>