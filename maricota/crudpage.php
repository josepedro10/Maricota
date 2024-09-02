<?php 
require_once('./db.php');

if(isset($_POST['delete'])){

    $id_pagamento = $_POST['id_pagamento'];

    // Use o parâmetro nomeado :id na consulta SQL
    $sql = "DELETE FROM pagamento WHERE id_pagamento = :id_pagamento";

    $sqlcombanco = $conexao->prepare($sql);
    // Vincula o parâmetro :id corretamente
    $sqlcombanco->bindParam(':id_pagamento', $id_pagamento, PDO::PARAM_INT);

    // Execute a consulta apenas uma vez
    if($sqlcombanco->execute()) {
        echo "<script type='text/javascript'>
                alert('O Pagamento foi excluído');
                window.location='listaproduto.php';
                </script>";
    }
}
?>