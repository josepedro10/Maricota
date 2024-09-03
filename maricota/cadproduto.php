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
                <img src="./imagens/nova.jpg" alt="Logo">
            </a>
        </div>
    </header>
    <main>
        <div class="container">
            <h1>Cadastro de Produto</h1>
            <form action="crudcadproduto.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Produto:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" id="preco" name="preco" required>
                </div>
                
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" required>
                </div>

                <div class="form-group">
                    <label for="categoria">Tipo de categoria:</label>
                    <select id="categoria" name="categoria">
                        <option value="">Selecione uma categoria existente</option>
                        <option value="Sapato">Sapato</option>
                        <option value="Tenis">Tênis</option>
                        <option value="Sandalia">Sandália</option>
                        <option value="Salto">Salto</option>
                        <option value="Bota">Bota</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imgs">Link para Imagem:</label>
                    <input type="text" id="imgs" name="imgs">
                </div>
                
                <div class="form-group">
                    <label>Tamanhos Disponíveis:</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="tamanhos[]" value="34"> 34</label>
                        <label><input type="checkbox" name="tamanhos[]" value="35"> 35</label>
                        <label><input type="checkbox" name="tamanhos[]" value="36"> 36</label>
                        <label><input type="checkbox" name="tamanhos[]" value="37"> 37</label>
                        <label><input type="checkbox" name="tamanhos[]" value="38"> 38</label>
                        <label><input type="checkbox" name="tamanhos[]" value="39"> 39</label>
                        <label><input type="checkbox" name="tamanhos[]" value="40"> 40</label>
                        <label><input type="checkbox" name="tamanhos[]" value="41"> 41</label>
                        <label><input type="checkbox" name="tamanhos[]" value="42"> 42</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="button-link" name="cad-produto">Cadastrar Produto</button>
                </div>
            </form>
            <div class="form-group">
                <a href="index.php" class="button-link">Voltar</a>
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
    </footer>
</body>
</html>
