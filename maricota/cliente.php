
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
    
    <main>
        <div class="formu">
        <h3>Acesse sua conta</h3>
        <form action="" method="post">
        
        <div class="email">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        
       <div class="senha">
       <label for="password">Senha</label>
       <input type="password" id="password" name="password" placeholder="Senha" required>
       </div>
        
       <div class="entrar">
        <input type="submit" value="Entrar" class="button-link">
       </div>
        </form>
        <a href="cadcliente.php" class="button-link">Cadastrar conta</a>
        </div>
        
        <?php
    include 'db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT id, email, senha FROM usuarios WHERE email = '$email'";
    $result =  $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($senha == $row['senha']) {
            $_SESSION['userid'] = $row['id'];
            header("Location: index.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
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