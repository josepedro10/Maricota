<?php
require_once('./db.php');
session_start();

// Verifica se o ID foi passado na URL
if (isset($_GET['id_produto'])) {
    $id = $_GET['id_produto'];

    // Consulta ao banco de dados para obter os dados do cliente
    $sql = "SELECT * FROM produtos WHERE id_produto = :id";
    $retorno = $conexao->prepare($sql);
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);
    $retorno->execute();

    // Transforma o retorno em array
    $array_retorno = $retorno->fetch();

    // Armazena retorno em variáveis, evitando erro caso a chave não exista
    $nome = $array_retorno['nome'] ?? '';
    $descricao = $array_retorno['descricao'] ?? '';
    $preco = $array_retorno['preco'] ?? '';
    $quantidade = $array_retorno['quantidade'] ?? '';
    $categoria = $array_retorno['categoria'] ?? '';
} 



if(isset($_POST["cad-produto"])){
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $categoria = $_POST["categoria"];
    $tamanhos = $_POST["tamanhos"];
    $imgs = $_POST["imgs"];

    require "./db.php";


    $sql = "INSERT INTO produtos VALUES (DEFAULT, '$nome', '$descricao', '$preco', '$quantidade', '$tamanhos', '$categoria', '$imgs')";
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $res = $stm->fetch();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="./css/cadproduto.css">
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
    <div class="container">
        <h1>Cadastro de Produto</h1>
        <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $id_produto; ?>">

            <div class="np">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required  value="<?php echo $nome; ?>">
            </div>
            
            <div class="desc">
            <label for="descricao">Descrição:</label>
            <input id="descricao" name="descricao" required  value="<?php echo $descricao; ?>"></input>
            </div>
            
            <div class="preco">
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required  value="<?php echo $preco; ?>">
            </div>
            
            <div class="quantidade">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required  value="<?php echo $quantidade; ?>">
            </div>

            <div class="categoria">
            <label for="tipo">Tipo de categoria:</label>
            <select id="categoria" name="categoria"  value="<?php echo $categoria; ?>">
            <option value="">Selecione uma categoria existente</option>
            <option value="Sapato">Sapato</option>
            <option value="Tenis">Tenis</option>
            <option value="Sandalia">Sandalia</option>
            <option value="Salto">Salto</option>
            <option value="Bota">Bota</option>
            </select>
            </div>

            <div class="imagem">
                <label for="imgs">Link para Imagem</label>
                <input type="text" id="imgs" name="imgs"  value="<?php echo $imgs; ?>">
            </div>
            
            <div class="tamanho">
            <label for="tamanhos">Tamanhos Disponíveis:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="tamanhos" value="34" value="<?php echo $tamanhos; ?>"> 34</label>
                <label><input type="checkbox" name="tamanhos" value="35"value="<?php echo $tamanhos; ?>"> 35</label>
                <label><input type="checkbox" name="tamanhos" value="36"value="<?php echo $tamanhos; ?>"> 36</label>
                <label><input type="checkbox" name="tamanhos" value="37" value="<?php echo $tamanhos; ?>"> 37</label>
                <label><input type="checkbox" name="tamanhos" value="38" value="<?php echo $tamanhos; ?>"> 38</label>
                <label><input type="checkbox" name="tamanhos" value="39" value="<?php echo $tamanhos; ?>"> 39</label>
                <label><input type="checkbox" name="tamanhos" value="40"value="<?php echo $tamanhos; ?>"> 40</label>
                <label><input type="checkbox" name="tamanhos" value="41"value="<?php echo $tamanhos; ?>"> 41</label>
                <label><input type="checkbox" name="tamanhos" value="42"value="<?php echo $tamanhos; ?>"> 42</label>
            </div>
            </div>
            
           <div class="cad">
           <button type="submit" class="button-link" name="cad-produto">Cadastrar Produto</button>
           </div>
        </form>
        <div class="voltar">
        <a href='index.php' class="button-link">voltar</a>
        </div>
    </div>
    

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
