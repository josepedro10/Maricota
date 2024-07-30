<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: cliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produto</h1>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>
            
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>
            
            <label for="tamanhos">Tamanhos Disponíveis:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="tamanhos[]" value="34"> 34</label>
                <label><input type="checkbox" name="tamanhos[]" value="35"> 35</label>
                <label><input type="checkbox" name="tamanhos[]" value="36"> 36</label>
                <label><input type="checkbox" name="tamanhos[]" value="37"> 37</label>
                <label><input type="checkbox" name="tamanhos[]" value="38"> 38</label>
                <label><input type="checkbox" name="tamanhos[]" value="39"> 39</label>
                <label><input type="checkbox" name="tamanhos[]" value="40"> 40</label>
                <label><input type="checkbox" name="tamanhos[]" value="41"> 41</label>
                <label><input type="checkbox" name="tamanhos[]" value="42"> 42</label>
            </div>
            
            <button type="submit">Cadastrar Produto</button>
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
