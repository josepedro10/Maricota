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

    <div class="foto">
    <img src="./imagens/bota.jpg" alt="">
    </div>

    <div class="ladodireito">
    <div class="descricao">
    <p>Bota prata perfeita para arrasar no inverso nas festas juninas e shows. Trazendo confiança e muita beleza, a francês up te deixa confortável e  linda.</p>
    </div>

    <div class="formu">
    <form action="pagamento.php" method="post">
    <label for='tamanho'>Tamanho:</label>
                        <select name='tamanho' id='tamanho'>
                            <option value='36'>36</option>
                            <option value='37'>37</option>
                            <option value='38'>38</option>
                            <option value='39'>39</option>
                            <option value='40'>40</option>
                            <option value='41'>41</option>
                            <option value='42'>42</option>
                            <option value='43'>43</option>
                        </select>
                        <input type='hidden' name='sapato' value='$sapato'>
                        <button type='submit' class="button-link">Comprar</button>
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