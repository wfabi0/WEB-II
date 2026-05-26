<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estados e Municípios</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">
        <h1>Cadastro</h1>

        <form action="#" method="post">

            <div class="campo">
                <label for="estado">Estado</label>

                <select name="estado" id="estado">
                    <option value="">Selecione um estado</option>

                    <!-- Estados serão carregados do banco de dados-->
                    <option value="1">Minas Gerais</option>
                    <option value="2">São Paulo</option>
                    <option value="3">Rio de Janeiro</option>

                </select>
            </div>

            <div class="campo">
                <label for="municipio">Município</label>

                <select name="municipio" id="municipio">
                    <option value="">Selecione um município</option>

                    <!--
                        As cidades devem ser carregadas
                        assincronamente após a seleção do estado.
                    -->


                </select>
            </div>

            <button type="submit">
                Enviar
            </button>

        </form>
    </div>

</body>
</html>

<script src="<?= base_url('js/script.js') ?>" defer></script>