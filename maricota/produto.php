<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maricota</title>
    <link rel="stylesheet" href="./css/produto.css">
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

    ini_set("display_errors", 1);
    require_once "./db.php";

    

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $query = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");
            $query->bindParam(':id', $id);
            try {
                $query->execute();
                $produto = $query->fetch(PDO::FETCH_ASSOC);
            }   catch (PDOException $e) {
                
            }
        }

        ?>

    <div class="foto">
    <img src="<?php echo $produto["imgs"]?>" alt="">
    </div>

    <div class="ladodireito">
    <h1><?php echo $produto["nome"]?></h1>
    <h2>R$<?php echo $produto["preco"]?></h2>
    <div class="descricao">
    <p><?php echo $produto["descricao"]?></p>
    </div>

    <div class="formu">
    <form action="carrinho.php" method="post">
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="Bota Frances Couro Prata">
            <input type="hidden" name="product_price" value="675.00">
            <label for="size">Tamanho:</label>
            <select id="size" name="product_size" class="button-link">
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
            </select>
            <label for="quantity">Quantidade:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1" class="button-link">
            <button type="submit" name="action" value="add" class="button-link">Adicionar ao Carrinho</button>
        </form>
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