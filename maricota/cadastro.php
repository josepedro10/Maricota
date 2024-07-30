<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: cliente.php");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $tamanhos = isset($_POST['tamanhos']) ? implode(',', $_POST['tamanhos']) : '';

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, tamanhos) VALUES ('$nome', '$descricao', '$preco', '$quantidade', '$tamanhos')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
