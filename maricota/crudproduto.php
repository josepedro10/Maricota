<?php 
require_once('./db.php');

if(isset($_POST['delete'])){

    $id = $_POST['id'];

    // Use o parâmetro nomeado :id na consulta SQL
    $sql = "DELETE FROM produtos WHERE id_produto = :id";

    $sqlcombanco = $conexao->prepare($sql);
    // Vincula o parâmetro :id corretamente
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute a consulta apenas uma vez
    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O cliente foi excluído');
                window.location='listaproduto.php';
                </script>";
    }
}
?>
