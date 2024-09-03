<?php 
require_once('./db.php');

if(isset($_POST['delete'])){

    $id = $_POST['id'];

    // Excluir registros da tabela pagamento relacionados ao produto
    $sql = "DELETE FROM pagamento WHERE id_produtos = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);
    $sqlcombanco->execute();

    // Depois, excluir o produto
    $sql = "DELETE FROM produtos WHERE id = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);
    
    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O Produto foi excluído');
                window.location='listaproduto.php';
                </script>";
    }
}

if(isset($_POST['editar'])){

    $id = $_POST['id'];

    // Excluir registros da tabela pagamento relacionados ao produto
    $sql = "UPDATE FROM pagamento WHERE id_produtos = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);
    $sqlcombanco->execute();

    // Depois, excluir o produto
    $sql = "DELETE FROM produtos WHERE id = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);
    
    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O Produto foi editado');
                window.location='listaproduto.php';
                </script>";
    }
}

?>
