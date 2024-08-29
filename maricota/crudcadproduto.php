<?php
session_start();

if(isset($_POST["cad-produto"])){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $tamanhos = $_POST["tamanhos"]; // Converte o array em uma string separada por vírgulas
    $categoria = $_POST["categoria"];
    $imgs = $_POST["imgs"];

    require "./db.php";

    // Especifica as colunas na consulta SQL
    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, tamanhos, categoria, imgs) 
            VALUES (:nome, :descricao, :preco, :quantidade, :tamanhos, :categoria, :imgs)";
    
    $stm = $conexao->prepare($sql);

    // Associa os valores às colunas
    $stm->bindParam(':nome', $nome);
    $stm->bindParam(':descricao', $descricao);
    $stm->bindParam(':preco', $preco);
    $stm->bindParam(':quantidade', $quantidade);
    $stm->bindParam(':tamanhos', $tamanhos);
    $stm->bindParam(':categoria', $categoria);
    $stm->bindParam(':imgs', $imgs);

    // Executa a consulta
    $stm->execute();

    echo "<script type='text/javascript'>
    alert('Cadastro realizado com sucesso');
    window.location='index.php';
    </script>";
}
?>
