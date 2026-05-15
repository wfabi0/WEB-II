
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

        <form>
            <input 
                type="email" 
                class="form-input"
                placeholder="Digite seu e-mail" 
                required
            >

            <input 
                type="password" 
                class="form-input"
                placeholder="Digite sua senha" 
                required
            >

            <button type="submit" class="primary-button">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
