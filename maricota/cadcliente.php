<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maricota</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="./imagens/nova.jpg" alt="">
            </a>
        </div>
    </header>

    <main class="cad">
        <div class="cadastro">
            <div class="formu">
                <h3>Cadastre sua conta</h3>
                <form action="" method="POST">

                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email" required>
                    </div>

                    <div class="senha">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" placeholder="senha" required>
                    </div>


                    <div class="cpf">
                        <label for="text">CPF</label>
                        <input type="text" name="cpf" placeholder="000.000.000-00">
                    </div>

                    <div class="criar">
                        <input type="submit" value="Criar Conta" class="button-link" name="cadastrar">
                    </div>
            </div>
        </div>

        </div>
        <?php
        require_once('./db.php');
        session_start();

        if (isset($_POST["cadastrar"])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpf = $_POST['cpf'];

            $sql = "INSERT INTO usuarios (email, senha, cpf) VALUES ('$email', '$password', '$cpf')";
            $stm = $conexao->prepare($sql);
            $stm->execute();
            $res = $stm->fetch();
        }
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