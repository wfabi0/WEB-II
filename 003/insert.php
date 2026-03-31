<?php

require_once 'connection.php';

function valida_cpf($cpf)
{
    $cpf = preg_replace('/\D/', '', $cpf);

    if (strlen($cpf) < 11) return false;

    $digitos_iguais = true;
    for ($i = 0; $i < strlen($cpf) - 1; $i++) {
        if ($cpf[$i] != $cpf[$i + 1]) {
            $digitos_iguais = false;
            break;
        }
    }

    if (!$digitos_iguais) {
        $numeros = substr($cpf, 0, 9);
        $digitos = substr($cpf, 9);
        $soma = 0;

        for ($i = 10; $i > 1; $i--) {
            $soma += $numeros[10 - $i] * $i;
        }

        $resultado = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);
        if ($resultado != $digitos[0]) return false;

        $numeros = substr($cpf, 0, 10);
        $soma = 0;

        for ($i = 11; $i > 1; $i--) {
            $soma += $numeros[11 - $i] * $i;
        }

        $resultado = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);
        if ($resultado != $digitos[1]) return false;

        return true;
    }

    return false;
}

function valida_cnpj($cnpj)
{
    $cnpj = preg_replace('/\D/', '', $cnpj);

    if (strlen($cnpj) < 14) return false;

    $digitos_iguais = true;
    for ($i = 0; $i < strlen($cnpj) - 1; $i++) {
        if ($cnpj[$i] != $cnpj[$i + 1]) {
            $digitos_iguais = false;
            break;
        }
    }

    if (!$digitos_iguais) {
        $tamanho = strlen($cnpj) - 2;
        $numeros = substr($cnpj, 0, $tamanho);
        $digitos = substr($cnpj, $tamanho);
        $soma = 0;
        $pos = $tamanho - 7;

        for ($i = $tamanho; $i >= 1; $i--) {
            $soma += $numeros[$tamanho - $i] * $pos--;
            if ($pos < 2) $pos = 9;
        }

        $resultado = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);
        if ($resultado != $digitos[0]) return false;

        $tamanho++;
        $numeros = substr($cnpj, 0, $tamanho);
        $soma = 0;
        $pos = $tamanho - 7;

        for ($i = $tamanho; $i >= 1; $i--) {
            $soma += $numeros[$tamanho - $i] * $pos--;
            if ($pos < 2) $pos = 9;
        }

        $resultado = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);
        if ($resultado != $digitos[1]) return false;

        return true;
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $cpf_cnpj = $_POST['cpf_cnpj'] ?? '';

    try {
        if (empty($nome) || empty($tipo) || empty($cpf_cnpj)) {
            die("Por favor, preencha todos os campos.");
        }

        $conn = new Connection("localhost", "exercicio", "root", "root");
        $pdoConn = $conn->getConnection();

        $sql = "INSERT INTO pessoas (nome, tipo, cpf_cnpj) VALUES (:nome, :tipo, :cpf_cnpj)";
        $stmt = $pdoConn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao inserir dados: " . $e->getMessage());
    }
}
