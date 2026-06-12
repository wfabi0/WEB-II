<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title>Cadastro de Clientes</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <div class="container py-5">

        <div class="card shadow-lg">

            <div class="card-body">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">

                    <div class="border-start border-4 border-primary ps-3">
                        <h1 class="h3 mb-1 page-title">
                            <i class="bi bi-people-fill me-2"></i>
                            Cadastro de Clientes
                        </h1>

                        <p class="page-subtitle mb-0">
                            Gerencie clientes de forma rápida, organizada e eficiente.
                        </p>
                    </div>

                    <button
                        class="btn btn-primary btn-lg px-4"
                        data-bs-toggle="modal"
                        data-bs-target="#clienteModal">

                        <i class="bi bi-person-plus-fill me-2"></i>
                        Novo Cliente

                    </button>

                </div>

                <div class="mb-4">

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>

                        <input
                            id="searchInput"
                            type="search"
                            class="form-control"
                            placeholder="Buscar cliente por nome..."
                            aria-label="Pesquisar cliente">

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>
                            <tr>
                                <th width="80">ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Cidade</th>
                                <th width="180">Estado</th>
                                <th width="220" class="text-end">Ações</th>
                            </tr>
                        </thead>

                        <tbody id="clienteTableBody">

                            <?php if (!empty($clientes)): ?>

                                <?php foreach ($clientes as $cliente): ?>
                                    <tr>
                                        <td><strong>#<?= $cliente['id'] ?></strong></td>
                                        <td><?= esc($cliente['nome']) ?></td>
                                        <td><?= esc($cliente['cpf']) ?></td>

                                        <td><?= esc($cliente['cidade_nome'] ?? '') ?></td>
                                        <td><span class="badge bg-secondary px-3 py-2"><?= esc($cliente['estado_nome'] ?? '') ?></span></td>

                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-outline-secondary btn-edit"
                                                data-id="<?= $cliente['id'] ?>"
                                                data-nome="<?= esc($cliente['nome']) ?>"
                                                data-cpf="<?= esc($cliente['cpf']) ?>"
                                                data-cidade-id="<?= $cliente['cidade_id'] ?>"
                                                data-estado-id="<?= $cliente['estado_id'] ?>"
                                                data-cidade-nome="<?= esc($cliente['cidade_nome'] ?? '') ?>"
                                                data-estado-nome="<?= esc($cliente['estado_nome'] ?? '') ?>">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </button>

                                            <button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-id="<?= $cliente['id'] ?>">
                                                <i class="bi bi-trash3"></i> Excluir
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                        Nenhum cliente cadastrado.
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade"
        id="clienteModal"
        tabindex="-1"
        aria-labelledby="clienteModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="clienteModalLabel">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Cadastro de Cliente
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Fechar">
                    </button>

                </div>

                <div class="modal-body">

                    <form id="clienteForm" action="<?= base_url('clientes/salvar') ?>" method="POST" novalidate>
                        <?= csrf_field() ?>

                        <input type="hidden" id="clienteId" name="id" value="<?= old('id') ?>">

                        <div class="mb-3">
                            <label for="clienteNome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control <?= session('errors.nome') ? 'is-invalid' : '' ?>"
                                id="clienteNome" name="nome" required minlength="3" maxlength="150"
                                placeholder="Digite o nome completo" value="<?= old('nome') ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.nome') ?: 'O nome é obrigatório (mínimo de 3 caracteres).' ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="clienteCpf" class="form-label">CPF</label>
                            <input type="text" class="form-control <?= session('errors.cpf') ? 'is-invalid' : '' ?>"
                                id="clienteCpf" name="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                                placeholder="000.000.000-00" value="<?= old('cpf') ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.cpf') ?: 'Digite um CPF válido no formato 000.000.000-00.' ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="clienteEstado" class="form-label">Estado</label>
                                <select class="form-select <?= session('errors.estado_id') ? 'is-invalid' : '' ?>"
                                    id="clienteEstado" name="estado_id" required>
                                    <option value="">Selecione um estado</option>
                                    <?php foreach ($estados as $estado): ?>
                                        <option value="<?= esc($estado['id']) ?>" <?= old('estado_id') == $estado['id'] ? 'selected' : '' ?>>
                                            <?= esc($estado['nome']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Selecione o estado.</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="clienteCidade" class="form-label">Cidade</label>
                                <select class="form-select <?= session('errors.cidade_id') ? 'is-invalid' : '' ?>"
                                    id="clienteCidade" name="cidade_id" required <?= old('estado_id') ? '' : 'disabled' ?>>
                                    <option value="">Selecione o estado primeiro</option>
                                </select>
                                <div class="invalid-feedback">Selecione a cidade.</div>
                            </div>
                        </div>

                        <div class="text-end mt-4 pt-3 border-top">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary" id="btnSubmitForm">
                                <i class="bi bi-check-circle me-1"></i> Salvar Cliente
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php if (session()->has('errors')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('clienteModal'));
                myModal.show();
            });
        </script>
    <?php endif; ?>

    <script>
        const oldEstadoId = '<?= old('estado_id') ?>';
        const oldCidadeId = '<?= old('cidade_id') ?>';
        const BASE_URL = '<?= base_url('/') ?>';
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/script.js') ?>" defer></script>

</body>

</html>