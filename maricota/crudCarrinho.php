<?php

function insertCarrinho($produto_id, $sessao_id, $quantidade)
{
    require realpath(__DIR__ . '/../../database/conection.php');
    
    // Usar a sintaxe de placeholder com nome
    $sql = "INSERT INTO carrinho (produto_id, sessao_id, quantidade) 
            VALUES (:produto_id, :sessao_id, :quantidade) 
            ON DUPLICATE KEY UPDATE quantidade = quantidade + VALUES(quantidade)";
    $stm = $conn->prepare($sql);
    
    $stm->bindParam(":produto_id", $produto_id, PDO::PARAM_INT);
    $stm->bindParam(":sessao_id", $sessao_id, PDO::PARAM_STR);
    $stm->bindParam(":quantidade", $quantidade, PDO::PARAM_INT);

    try {
        return $stm->execute();
    } catch (PDOException $e) {
        echo "Erro ao inserir no carrinho: " . $e->getMessage();
        return false;
    }
}

function findAllCarrinho($sessao_id)
{
    require realpath(__DIR__ . '/../../database/conection.php');

    // Seleciona todos os dados relevantes dos produtos no carrinho
    $sql = "SELECT p.id, p.nome, p.preco, p.imagem, c.quantidade
            FROM carrinho c
            INNER JOIN produtos p ON c.produto_id = p.id
            WHERE c.sessao_id = :sessao_id";
    $stm = $conn->prepare($sql);
    $stm->bindParam(":sessao_id", $sessao_id, PDO::PARAM_STR);

    try {
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar carrinho: " . $e->getMessage();
        return false;
    }
}

function deleteCarrinho($produto_id, $sessao_id)
{
    require realpath(__DIR__ . '/../../database/conection.php');
    
    // Remove o item do carrinho
    $sql = "DELETE FROM carrinho WHERE produto_id = :produto_id AND sessao_id = :sessao_id";
    $stm = $conn->prepare($sql);
    $stm->bindParam(":produto_id", $produto_id, PDO::PARAM_INT);
    $stm->bindParam(":sessao_id", $sessao_id, PDO::PARAM_STR);

    try {
        return $stm->execute();
    } catch (PDOException $e) {
        echo "Erro ao remover do carrinho: " . $e->getMessage();
        return false;
    }
}
