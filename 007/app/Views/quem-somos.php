<?= $this->extend('layout') ?>

<?= $this->section('page-title') ?>
Blog | Quem Somos
<?= $this->endSection() ?>



<?= $this->section('header-css') ?>

<?= $this->endSection() ?>

<?= $this->section('header-js') ?>

<?= $this->endSection() ?>



<?= $this->section('content') ?>
<h1>Página Quem Somos</h1>
<h2>Datos: <?= $campus ?>, <?= $curso ?></h2>
<?= $this->endSection() ?>