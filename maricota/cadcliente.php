<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maricota</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="./imagens/nova.jpg" alt="">
        </div>
</header>

    <main class="cad">
    <div class="cadastro">
    <div class="formu">
        <h3>Cadastre sua conta</h3>
        <form action="listacliente.php" method="post">
        
        <div class="email">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="email" required>
        </div>
        
       <div class="senha">
       <label for="password">Senha</label>
       <input type="password" id="password" name="password" placeholder="senha" required>
       </div>
       <div class="senha">
       <label for="password">Repita a senha</label>
       <input type="password" id="password" name="password" placeholder="repita a senha" required>
       </div>

        <div class="genero">
        <label for="" class="nomeg">Genero</label>
        <input type="radio" id="m" name="m" value="Masculino">
        <label for="m">Masculino</label>
        <input type="radio" id="f" name="f" value="Feminino">
        <label for="f">Feminino</label>
        <input type="radio" id="outro" name="o" value="Outro">
        <label for="outro">Outro</label>
        </div>

    <div class="cpf">
        <label for="text">CPF</label>
        <input type="text" name="cpf" placeholder="000.000.000-00">
    </div>

    <div class="numero">
        <label for="telefone">celular</label>
        <input type="tel" id="phone" name="telefone" placeholder="(00) 00000-0000">
    </div>

    <div class="criar">
    <a href="produto.php" class="button-link">Criar conta</a>
    </div>
    </div>
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