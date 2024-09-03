<?php 
require_once('./db.php');

if(isset($_POST['editar'])){

    $id = $_POST['id'];

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $categoria = $_POST["categoria"];
    $tamanhos = $_POST["tamanhos"];
    $imgs = $_POST["imgs"];

   // Código SQL para atualização do produto
   $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, 
   quantidade = :quantidade, categoria = :categoria, tamanhos = :tamanhos, imgs = :imgs WHERE id = :id";

   $sqlcombanco = $conexao->prepare($sql);

   // Vinculação dos parâmetros
   $sqlcombanco->bindParam(':nome', $nome, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':descricao', $descricao, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':preco', $preco, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
   $sqlcombanco->bindParam(':tamanhos', $tamanhos, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':categoria', $categoria, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':imgs', $imgs, PDO::PARAM_STR);
   $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT); // Aqui estava o problema

   // Executa a consulta
   if($sqlcombanco->execute()) {
       echo "<script type='text/javascript'>
               alert('O Produto foi editado');
               window.location='listaproduto.php';
             </script>";
   }
}
?>
