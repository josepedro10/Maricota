<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maricota</title>
    <link rel="stylesheet" href="./css/listaproduto.css">
</head>
<body>

<header>
<div class="logo">
            <a href="index.php">
            <img src="./imagens/nova.jpg" alt="">
            </a>
        </div>
</header>

<main>
<?php 
  require_once( './db.php');

  $retorno = $conexao->prepare('SELECT * FROM produtos');

  $retorno->execute();

?>       
        <table> 
            <thead>
                <tr>
                    <th>Nome Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Tamanhos Disponíveis</th>
                </tr>
            </thead>

            <tbody>
                <tr> 
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr> 
                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['descricao']?> </td> 
                            <td> <?php echo $value['preco']?> </td> 
                            <td> <?php echo $value['quantidade']?> </td> 
                            <td> <?php echo $value['tamanhos']?> </td>  

                            <td>
                               <form method="POST" action="cadproduto.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
<?php         
   echo "<button class='button button3'><a href='index.php'>voltar</a></button>";
?>
</main>

<footer>
    <div class="footer-container">
            <div class="footer-column">
                <h3>Sobre Nós</h3>
                <p>Aqui na Loja de Sapatos, oferecemos a melhor seleção de calçados para todos os estilos e ocasiões. Qualidade e conforto garantidos.</p>
            </div>
            <div class="footer-column">
                <h3>Links Úteis</h3>
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Novidades</a></li>
                    <li><a href="#">Promoções</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contato</h3>
                <ul>
                    <li>Email: maricota01@gmail.com</li>
                    <li>Telefone: (77) 5534-5378</li>
                    <li>Endereço: Rua 10 de Maio, 453, Guanambi, BA</li>
                </ul>
            </div>
            </div>
        </div>
    </footer>
</body>
</html>