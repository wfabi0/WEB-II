<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $this->renderSection("page-title") ?> </title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <?= $this->renderSection("header-css") ?>
    <?= $this->renderSection("header-js") ?>
</head>

<body>

    <header>
        <?= $this->include('components/nav') ?>
    </header>

    <main>
        <!-- Área em branco -->
        <?= $this->renderSection("content") ?>

    </main>

    <footer>
        <p>Rodapé do site</p>
    </footer>

</body>

</html>
<?= $this->renderSection("footer-js") ?>