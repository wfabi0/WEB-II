document.addEventListener("DOMContentLoaded", function () {
  alert(BASE_URL);

  const estadoSelect = document.getElementById("estado");
  const municipioSelect = document.getElementById("municipio");

  estadoSelect.addEventListener("change", async (e) => {
    const estadoId = e.target.value;

    if (!estadoId) return;

    municipioSelect.innerHTML = '<option value="">Carregando...</option>';

    const res = await fetch(BASE_URL + `estados/${estadoId}/municipios`);
    const data = await res.json();

    municipioSelect.innerHTML =
      '<option value="">Selecione o município</option>';

    data.forEach((municipio) => {
      console.log(municipio);
      const option = document.createElement("option");
      option.value = municipio.id;
      option.textContent = municipio.nome;
      municipioSelect.appendChild(option);
    });
  });
});
