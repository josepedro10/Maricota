<?php 
require_once('./db.php');

if(isset($_POST['delete'])){

    $id = $_POST['id_cliente'];

    // Use o parâmetro nomeado :id na consulta SQL
    $sql = "DELETE FROM usuarios WHERE id_cliente = :id_cliente";

    $sqlcombanco = $conexao->prepare($sql);
    // Vincula o parâmetro :id corretamente
    $sqlcombanco->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

    // Execute a consulta apenas uma vez
    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O cliente foi excluído');
                window.location='listacliente.php';
                </script>";
    }
}
?>
