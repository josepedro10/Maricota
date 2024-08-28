<?php 
require_once('./db.php');
session_start();

// Verifica se o ID foi passado na URL
if (isset($_GET['id_cliente'])) {
    $id = $_GET['id_cliente'];

    // Consulta ao banco de dados para obter os dados do cliente
    $sql = "SELECT * FROM usuarios WHERE id_cliente = :id_cliente";
    $retorno = $conexao->prepare($sql);
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);
    $retorno->execute();

    // Transforma o retorno em array
    $array_retorno = $retorno->fetch();

    // Armazena retorno em variáveis, evitando erro caso a chave não exista
    $nome = $array_retorno['nome'] ?? '';
    $password = $array_retorno['senha'] ?? ''; // Corrigi para 'senha' se for o nome correto no BD
    $email = $array_retorno['email'] ?? '';
    $cpf = $array_retorno['cpf'] ?? '';
} else {
    die("ID do cliente não definido.");
}

if (isset($_POST["cadastrar"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];

    $sql = "INSERT INTO usuarios (email, senha, cpf, nome) VALUES ('$email', '$password', '$cpf', '$nome')";
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $res = $stm->fetch();

    // Após cadastrar, redireciona para a lista de clientes ou exibe mensagem
    echo "<script type='text/javascript'>
            alert('Cliente cadastrado com sucesso!');
            window.location='listacliente.php';
          </script>";
}
?>

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

                    <input type="hidden" name="id" value="<?php echo $id_cliente; ?>">

                    <div class="nome">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="nome" required value="<?php echo $nome; ?>">
                    </div>

                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email" required value="<?php echo $email; ?>">
                    </div>

                    <div class="senha">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" placeholder="senha" required value="<?php echo $password; ?>">
                    </div>

                    <div class="cpf">
                        <label for="text">CPF</label>
                        <input type="text" name="cpf" placeholder="000.000.000-00" value="<?php echo $cpf; ?>">
                    </div>

                    <div class="criar">
                        <input type="submit" value="Criar Conta" class="button-link" name="cadastrar">
                    </div>
                    
                    <div class="voltar">
                        <a href='index.php' class="button-link">voltar</a>
                    </div>
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
    </footer>

</body>
</html>
