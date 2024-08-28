<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maricota</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./imagens/nova.jpg" alt="">
        </div>

       <div class="espacamento">

       <div class="lista">
        <a href="listaproduto.php" class="button-link">Lista Produto</a>
       </div>

        <div class="lista">
            <a href="listacliente.php" class="button-link">Lista Cliente</a>
        </div>

       <div class="search">
        <a href="cadproduto.php" class="button-link">Cadastre seu produto</a>
        </div>

        <div class="ac">
            <a href="cliente.php">
                <img src="./imagens/person.png" alt="">
            </a>
        </div>

        <div class="carrinho">
            <a href="carrinho.php">
                <img src="./imagens/sacola.png" alt="">
            </a>
        </div>
       </div>
    </header>

    <main>

    <h1>Sapatos</h1>
    <hr>


    <div class="linha1">

        <?php 
        require_once "./db.php";

        $sql = "SELECT * FROM produtos";

        $stm = $conexao->prepare($sql);
        
        $stm->execute();

        $produtos = $stm->fetchAll();
        
        foreach ($produtos as $produto) {
            if($produto["categoria"] == "Sapato"){
        ?>

        <form method="get" action="produto.php" class="pr1">
            <input type="hidden" name="id" value="<?= $produto["id_produto"] ?>">
            <img src="<?php echo $produto["imgs"]?>" alt="">
            <p><?php echo $produto["nome"]?></p>
            <p>R$<?php echo $produto["preco"]?></p>
            <div class="adicionais">
                <button class="button-link"> Comprar</button>
            </div>
        </form>

        <?php }}?>
            
    </div>


    <h1>Tenis</h1>
    <hr>

    <div class="linha2">

    <?php 
    foreach ($produtos as $produto) {
        if($produto["categoria"] == "Tenis"){
    ?>

    <form method="get" action="produto.php" class="pr2">
        <input type="hidden" name="id" value="<?= $produto["id_produto"] ?>">
        <img src="<?php echo $produto["imgs"]?>" alt="">
        <p><?php echo $produto["nome"]?></p>
        <p>R$<?php echo $produto["preco"]?></p>
        <div class="adicionais">
            <button class="button-link"> Comprar</button>
        </div>
    </form>

    <?php }}?>
    
       


    </div>

    <h1>Sandalias</h1>
    <hr>

    <div class="linha3">

    <?php 
    foreach ($produtos as $produto) {
        if($produto["categoria"] == "Sandalia"){
    ?>

    <form method="get" action="produto.php" class="pr3">
        <input type="hidden" name="id" value="<?= $produto["id_produto"] ?>">
        <img src="<?php echo $produto["imgs"]?>" alt="">
        <p><?php echo $produto["nome"]?></p>
        <p>R$<?php echo $produto["preco"]?></p>
        <div class="adicionais">
            <button class="button-link"> Comprar</button>
        </div>
    </form>

    <?php }}?>
    

    </div>

     <h1>Saltos</h1>
    <hr>

    <div class="linha4">

    <?php 
    foreach ($produtos as $produto) {
        if($produto["categoria"] == "Salto"){
    ?>

    <form method="get" action="produto.php" class="pr4">
        <input type="hidden" name="id" value="<?= $produto["id_produto"] ?>">
        <img src="<?php echo $produto["imgs"]?>" alt="">
        <p><?php echo $produto["nome"]?></p>
        <p>R$<?php echo $produto["preco"]?></p>
        <div class="adicionais">
            <button class="button-link"> Comprar</button>
        </div>
    </form>

    <?php }}?>
        
    </div>

        
    <h1>Botas</h1>
    <hr>

    <div class="linha5">

    <?php 
    foreach ($produtos as $produto) {
        if($produto["categoria"] == "Bota"){
    ?>

    <form method="get" action="produto.php" class="pr5">
        <input type="hidden" name="id" value="<?= $produto["id_produto"] ?>">
        <img src="<?php echo $produto["imgs"]?>" alt="">
        <p><?php echo $produto["nome"]?></p>
        <p>R$<?php echo $produto["preco"]?></p>
        <div class="adicionais">
            <button class="button-link"> Comprar</button>
        </div>
    </form>

    <?php }}?>

    
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