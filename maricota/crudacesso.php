<?php
    include 'db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $nome = $_POST['nome'];

    $sql = "SELECT id_cliente, email, senha, nome FROM usuarios WHERE email = '$email'";
    }
    ?>
"<script type='text/javascript'>
alert('Acesso realizado com sucesso');
window.location='index.php';
</script>";
