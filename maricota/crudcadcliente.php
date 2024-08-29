<?php
        require_once('./db.php');
        session_start();

        if (isset($_POST["cadastrar"])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];

            $sql = "INSERT INTO usuarios (email, senha, cpf, nome) VALUES ('$email', '$password', '$cpf', '$nome')";
            $stm = $conexao->prepare($sql);
            $stm->execute();
            $res = $stm->fetch();
        }
        ?>

"<script type='text/javascript'>
alert('Cadastro realizado com sucesso');
window.location='index.php';
</script>";
