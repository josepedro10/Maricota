<?php 
require_once('./db.php');

if(isset($_POST['editar'])){

    $id = $_POST['id'];

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];

   // Código SQL para atualização do cliente
   $sql = "UPDATE usuarios SET email = :email, senha = :senha, cpf = :cpf, nome = :nome
    WHERE id = :id";

   $sqlcombanco = $conexao->prepare($sql);

   // Vinculação dos parâmetros
   $sqlcombanco->bindParam(':email', $email, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':senha', $senha, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':cpf', $cpf, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':nome', $nome, PDO::PARAM_STR);  // Alterado para PDO::PARAM_STR
   $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT); // Vinculação do parâmetro id

   // Executa a consulta
   if($sqlcombanco->execute()) {
       echo "<script type='text/javascript'>
               alert('O Cliente foi editado');
               window.location='listacliente.php';
             </script>";
   }
}
?>
