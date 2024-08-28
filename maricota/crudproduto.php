<?php 
require_once('./db.php');

if(isset($_POST['delete'])){

    $id_produto = $_POST['id_produto'];

    // Use o parâmetro nomeado :id na consulta SQL
    $sql = "DELETE FROM usuarios WHERE id_produto = :id_produto";

    $sqlcombanco = $conexao->prepare($sql);
    // Vincula o parâmetro :id corretamente
    $sqlcombanco->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);

    // Execute a consulta apenas uma vez
    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O cliente foi excluído');
                window.location='listaproduto.php';
                </script>";
    }
}
?>
