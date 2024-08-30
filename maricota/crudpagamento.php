<?php
        require_once('./db.php');
        session_start();

        if (isset($_POST["pagamento"])) {
            $nomecompleto = $_POST['nomecompleto'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $cep = $_POST['cep'];
            $numerocartao = $_POST['numerocartao'];
            $datavalidade = $_POST['datavalidade'];
            $cvv = $_POST['cvv'];
            

            $sql = "INSERT INTO pagamento (nomecompleto, email, endereco, cidade, cep, numerocartao, datavalidade, cvv) VALUES ('$nomecompleto', '$email', '$endereco', '$cidade', '$cep', '$numerocartao', '$datavalidade', '$cvv')";
            $stm = $conexao->prepare($sql);
            $stm->execute();
            $res = $stm->fetch();
        }
        ?>
        "<script type='text/javascript'>
        alert('Pagamento realizado com sucesso!');
        window.location='index.php';
        </script>";