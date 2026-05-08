<?= $this->extend('layout') ?>

<?= $this->section('page-title') ?>
Blog | Noticias
<?= $this->endSection() ?>



<?= $this->section('header-css') ?>

<?= $this->endSection() ?>

<?= $this->section('header-js') ?>

<?= $this->endSection() ?>



<?= $this->section('content') ?>
<h1>Página Noticias</h1>
<br>
<h2><i>"<?= $hello ?>"</i></h2>
<?= $this->endSection() ?>



<?= $this->section('footer-js') ?>
<script defer src="<?= base_url('js/script.js') ?>"></script>
<?= $this->endSection() ?>