<?php 
require_once('./db.php');

if(isset($_POST['delete'])){

    $id = $_POST['id'];

    // Substitua 'usuario_id' pelo nome correto da coluna em 'pagamento'
    $sql = "DELETE FROM pagamento WHERE id_usuario = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);
    $sqlcombanco->execute();

    // Excluir o cliente na tabela 'usuarios'
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);

    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O cliente foi excluído');
                window.location='listacliente.php';
                </script>";
    }
}
?>
