document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const clienteTableBody = document.getElementById("clienteTableBody");
  const clienteModal = document.getElementById("clienteModal");
  const clienteForm = document.getElementById("clienteForm");

  const clienteIdInput = document.getElementById("clienteId");
  const clienteNomeInput = document.getElementById("clienteNome");
  const clienteCpfInput = document.getElementById("clienteCpf");
  const clienteCidadeSelect = document.getElementById("clienteCidade");
  const clienteEstadoSelect = document.getElementById("clienteEstado");

  let bsModal = null;
  if (clienteModal) {
    bsModal = new bootstrap.Modal(clienteModal);
  }

  function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute("content") : "";
  }

  function updateCsrfToken(newToken) {
    if (newToken) {
      const metaTag = document.querySelector('meta[name="csrf-token"]');
      if (metaTag) metaTag.setAttribute("content", newToken);

      const csrfInput = document.querySelector('input[name="csrf_test_name"]');
      if (csrfInput) csrfInput.value = newToken;
    }
  }

  function showAlert(message, type = "success") {
    const alertPlaceholder = document.createElement("div");
    alertPlaceholder.className = `alert alert-${type} alert-dismissible fade show position-fixed bottom-0 end-0 m-4 shadow-sm`;
    alertPlaceholder.style.zIndex = 1080;
    alertPlaceholder.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
    document.body.appendChild(alertPlaceholder);
    setTimeout(() => {
      const alertInstance =
        bootstrap.Alert.getOrCreateInstance(alertPlaceholder);
      if (alertInstance) alertInstance.close();
    }, 3000);
  }

  async function carregarCidades(estadoId, cidadeSelecionadaId = null) {
    if (!estadoId) {
      clienteCidadeSelect.innerHTML =
        '<option value="">Selecione o estado primeiro</option>';
      clienteCidadeSelect.disabled = true;
      return;
    }

    try {
      clienteCidadeSelect.innerHTML = '<option value="">Carregando...</option>';
      clienteCidadeSelect.disabled = true;

      const response = await fetch(`${BASE_URL}clientes/buscarCidades`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": getCsrfToken(),
        },
        body: JSON.stringify({ estado: estadoId }),
      });

      if (!response.ok) throw new Error("Erro na rede");

      const data = await response.json();

      updateCsrfToken(data.csrfHash);

      clienteCidadeSelect.innerHTML =
        '<option value="">Selecione a cidade</option>';

      if (
        data.status === "success" &&
        data.cidades &&
        data.cidades.length > 0
      ) {
        data.cidades.forEach((cidade) => {
          const option = document.createElement("option");
          option.value = cidade.id;
          option.textContent = cidade.nome;
          clienteCidadeSelect.appendChild(option);
        });

        clienteCidadeSelect.disabled = false;

        if (cidadeSelecionadaId) {
          clienteCidadeSelect.value = cidadeSelecionadaId;
        }
      } else {
        clienteCidadeSelect.innerHTML =
          '<option value="">Nenhuma cidade encontrada</option>';
      }
    } catch (error) {
      console.error("Erro ao buscar cidades:", error);
      clienteCidadeSelect.innerHTML =
        '<option value="">Erro ao carregar</option>';
    }
  }

  if (clienteEstadoSelect) {
    clienteEstadoSelect.addEventListener("change", (e) => {
      carregarCidades(e.target.value);
    });
  }

  const btnNovoCliente = document.querySelector(
    '[data-bs-target="#clienteModal"]',
  );
  if (btnNovoCliente) {
    btnNovoCliente.addEventListener("click", () => {
      clienteForm.classList.remove("was-validated");
      clienteForm.reset();
      clienteIdInput.value = "";
      clienteCidadeSelect.innerHTML =
        '<option value="">Selecione o estado primeiro</option>';
      clienteCidadeSelect.disabled = true;
      document.getElementById("clienteModalLabel").innerHTML =
        '<i class="bi bi-person-plus-fill me-2"></i> Cadastro de Cliente';
      bsModal.show();
    });
  }

  if (clienteTableBody) {
    clienteTableBody.addEventListener("click", async function (event) {
      const editButton = event.target.closest(".btn-edit");
      const deleteButton = event.target.closest(".btn-delete");

      if (editButton) {
        clienteForm.classList.remove("was-validated");
        clienteIdInput.value = editButton.dataset.id;
        clienteNomeInput.value = editButton.dataset.nome;
        clienteCpfInput.value = editButton.dataset.cpf;
        clienteEstadoSelect.value = editButton.dataset.estadoId;

        document.getElementById("clienteModalLabel").innerHTML =
          '<i class="bi bi-pencil-square me-2"></i> Editar Cliente';

        await carregarCidades(
          editButton.dataset.estadoId,
          editButton.dataset.cidadeId,
        );
        bsModal.show();
      }

      if (deleteButton) {
        const id = deleteButton.dataset.id;
        const row = deleteButton.closest("tr");

        if (!confirm("Tem certeza que deseja excluir este cliente?")) return;

        const originalHtml = deleteButton.innerHTML;
        deleteButton.innerHTML =
          '<span class="spinner-border spinner-border-sm"></span>';
        deleteButton.disabled = true;

        try {
          const response = await fetch(`${BASE_URL}clientes/excluir`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-TOKEN": getCsrfToken(),
            },
            body: JSON.stringify({ id: id }),
          });

          const data = await response.json();
          updateCsrfToken(data.csrfHash);

          if (response.ok && data.status === "success") {
            row.remove();
            showAlert("Cliente excluído com sucesso.", "warning");
          } else {
            showAlert(data.message || "Erro ao excluir cliente.", "danger");
            deleteButton.innerHTML = originalHtml;
            deleteButton.disabled = false;
          }
        } catch (error) {
          showAlert("Erro de comunicação com o servidor.", "danger");
          deleteButton.innerHTML = originalHtml;
          deleteButton.disabled = false;
        }
      }
    });
  }

  if (clienteForm) {
    clienteForm.addEventListener("submit", function (event) {
      let formValido = true;

      clienteForm.classList.remove("was-validated");

      if (clienteNomeInput.value.trim().length < 3) formValido = false;
      if (!clienteCpfInput.checkValidity()) formValido = false;
      if (clienteEstadoSelect.value === "" || clienteCidadeSelect.value === "")
        formValido = false;

      if (!formValido || !clienteForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        clienteForm.classList.add("was-validated");
        return;
      }

      const btnSubmit = document.getElementById("btnSubmitForm");
      btnSubmit.innerHTML =
        '<span class="spinner-border spinner-border-sm me-2"></span>Enviando...';
      btnSubmit.disabled = true;
    });
  }

  if (searchInput) {
    searchInput.addEventListener("input", function () {
      const termo = this.value.trim().toLowerCase();
      const linhas = Array.from(clienteTableBody.querySelectorAll("tr"));

      linhas.forEach((row) => {
        if (row.querySelector("td[colspan]")) return;
        const nome = row.children[1].textContent.toLowerCase();
        row.style.display = nome.includes(termo) ? "" : "none";
      });
    });
  }

  if (typeof oldEstadoId !== "undefined" && oldEstadoId !== "") {
    carregarCidades(oldEstadoId, oldCidadeId);
  }
});
