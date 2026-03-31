<?php

require_once 'connection.php';

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
