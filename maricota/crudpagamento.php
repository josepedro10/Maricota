<?php
        require_once('./db.php');
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_produtos = $_POST['id_produtos'];
            $id_usuario = $_POST['id_usuario'];
            $nomecompleto = $_POST['nomecompleto'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $cep = $_POST['cep'];
            $numerocartao = $_POST['numerocartao'];
            $datavalidade = $_POST['datavalidade'];
            $cvv = $_POST['cvv'];
        
            // Consulta SQL para inserir dados na tabela pagamento
            $sql = "INSERT INTO pagamento (id_produtos, id_usuario, nomecompleto, email, endereco, cidade, cep, numerocartao, datavalidade, cvv) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            // Prepara a consulta
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iisssssbss", $id_produtos, $id_usuario, $nomecompleto, $email, $endereco, $cidade, $cep, $numerocartao, $datavalidade, $cvv);
        
            // Executa a consulta
            if ($stmt->execute()) {
                echo "Pagamento registrado com sucesso!";
            } else {
                echo "Erro ao registrar pagamento: " . $stmt->error;
            }
        
            // Fecha a consulta e a conexão
            $stmt->close();
        }
        
        $conn->close();
        
        ?>
        "<script type='text/javascript'>
        alert('Pagamento realizado com sucesso!');
        window.location='index.php';
        </script>";