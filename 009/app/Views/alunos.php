<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>

<body>

    <h1>Cadastro de Alunos</h1>

    <form action="<?= base_url("cadastrar-aluno") ?>" method="post">
        <label for="nome" name="nome_alu">Nome:</label>
        <input id="nome" name="nome_alu" type="text" required>

        <br> <br>

        <label for="nota">Nota:</label>
        <input id="nota" name="nota_alu" type="number" min="0" step="1" max="100" required>

        <br> <br>

        <input type="submit" value="Enviar">

        <?php if (session()->getFlashdata('sucesso')): ?>
            <br>
            <div>
                <?= session()->getFlashdata('sucesso') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('erro')): ?>
            <br>
            <div>
                <?= session()->getFlashdata('erro') ?>
            </div>
        <?php endif; ?>
    </form>

</body>

</html>