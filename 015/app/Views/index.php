<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Busca de CEP</h3>
                    </div>

                    <div class="card-body">
                        <form id="cepForm" action="/consulta-cep" method="POST">
                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="cep"
                                    name="cep"
                                    placeholder="Digite o CEP"
                                    maxlength="9"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Consultar CEP
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php if ($session()->has('cepData')): ?>
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>CEP encontrado!</strong><br>
                CEP: <?= esc($cepData['cep']) ?><br>
                Logradouro: <?= esc($cepData['street']) ?><br>
                Bairro: <?= esc($cepData['neighborhood']) ?><br>
                Cidade: <?= esc($cepData['city']) ?><br>
                Estado: <?= esc($cepData['state']) ?>     
            </div>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('cepForm').addEventListener('submit', function(e) {
            

            const cep = document.getElementById('cep').value;


            //Verificar se o CEP é válido (apenas números ou números com hífen)
            const cepPattern = /^\d{5}-?\d{3}$/;

            if (!cepPattern.test(cep)) {

                //Evita o envio do formulário
                e.preventDefault();


                //Exibe a mensagem de erro no modal
                document.getElementById('modalBody').innerHTML =
                    'CEP inválido. Por favor, insira um CEP válido.';
                const modal = new bootstrap.Modal(
                    document.getElementById('cepModal')
                );

                modal.show();

                return;
            }

            
        });
    </script>

</body>




<div class="modal fade" id="cepModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    Atenção
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Fechar">
                </button>
            </div>

            <div class="modal-body" id="modalBody">
                Ocorreu um erro.
            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-danger"
                        data-bs-dismiss="modal">
                    Fechar
                </button>
            </div>

        </div>
    </div>
</div>

</html>