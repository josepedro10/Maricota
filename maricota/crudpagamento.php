<?php
require_once('./db.php'); // Certifique-se de que este arquivo está criando uma conexão e atribuindo à variável $conexao
session_start();

// Verifica se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica se as chaves estão definidas antes de acessá-las
    $id_produtos = isset($_POST['id_produtos']) ? $_POST['id_produtos'] : '';
    $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';
    $nomecompleto = isset($_POST['nomecompleto']) ? $_POST['nomecompleto'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $numerocartao = isset($_POST['numerocartao']) ? $_POST['numerocartao'] : '';
    $datavalidade = isset($_POST['datavalidade']) ? $_POST['datavalidade'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    try {
        // Consulta SQL para inserir dados na tabela pagamento
        $sql = "INSERT INTO pagamento (id_produtos, id_usuario, nomecompleto, email, endereco, cidade, cep, numerocartao, datavalidade, cvv) 
                VALUES (:id_produtos, :id_usuario, :nomecompleto, :email, :endereco, :cidade, :cep, :numerocartao, :datavalidade, :cvv)";
        
        // Prepara a consulta
        $stmt = $conexao->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':id_produtos', $id_produtos, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':nomecompleto', $nomecompleto, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindParam(':cep', $cep, PDO::PARAM_STR);
        $stmt->bindParam(':numerocartao', $numerocartao, PDO::PARAM_STR);
        $stmt->bindParam(':datavalidade', $datavalidade, PDO::PARAM_STR);
        $stmt->bindParam(':cvv', $cvv, PDO::PARAM_STR);
        
        // Executa a consulta
        $stmt->execute();
        echo "Pagamento registrado com sucesso!";
        
    } catch (PDOException $e) {
        echo "Erro ao registrar pagamento: " . $e->getMessage();
    }
}
?>

<script type='text/javascript'>
    alert('Pagamento realizado com sucesso!');
    window.location='index.php';
</script>
