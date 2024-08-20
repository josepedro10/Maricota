<?php

require_once "./db.php";

session_start();

// Inicializa o carrinho se não estiver configurado
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $tamanho = $_POST['tamanho'];

    // Gera uma chave única para o item do carrinho, com base no ID e tamanho
    $cart_key = $id . '_' . $tamanho;

    if ($_POST['action'] == 'add') {
        // Adiciona ou atualiza a quantidade do item no carrinho
        if (isset($_SESSION['cart'][$cart_key])) {
            $_SESSION['cart'][$cart_key]['quantidade'] += $quantidade;
        } else {
            $_SESSION['cart'][$cart_key] = array(
                'nome' => $nome,
                'preco' => $preco,
                'quantidade' => $quantidade,
                'tamanho' => $tamanho
            );
        }
    } elseif ($_POST['action'] == 'update') {
        // Atualiza a quantidade e o tamanho do item no carrinho
        if (isset($_SESSION['cart'][$cart_key])) {
            $_SESSION['cart'][$cart_key]['quantidade'] = $quantidade;
            $_SESSION['cart'][$cart_key]['tamanho'] = $tamanho;
        }
    } elseif ($_POST['action'] == 'remove') {
        // Remove o item do carrinho
        if (isset($_SESSION['cart'][$cart_key])) {
            unset($_SESSION['cart'][$cart_key]);
        }
    }
}

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart_key => $produto) {
        echo "<div class='cart-item'>
                <p>{$produto['nome']} - Tamanho: {$produto['tamanho']} - Preço: {$produto['preco']} - Quantidade: {$produto['quantidade']}</p>
                <input type='hidden' name='cart_key' value='$cart_key'>
                <label for='quantidade_{$cart_key}'>Quantidade:</label>
                <input type='number' id='quantidade_{$cart_key}' name='quantidade' value='{$produto['quantidade']}' min='1'>
                <label for='tamanho_{$cart_key}'>Tamanho:</label>
                <select id='tamanho_{$cart_key}' name='tamanho'>
                    <option value='34' " . ($produto['tamanho'] == '34' ? 'selected' : '') . ">34</option>
                    <option value='35' " . ($produto['tamanho'] == '35' ? 'selected' : '') . ">35</option>
                    <option value='36' " . ($produto['tamanho'] == '36' ? 'selected' : '') . ">36</option>
                    <option value='37' " . ($produto['tamanho'] == '37' ? 'selected' : '') . ">37</option>
                    <option value='38' " . ($produto['tamanho'] == '38' ? 'selected' : '') . ">38</option>
                    <option value='39' " . ($produto['tamanho'] == '39' ? 'selected' : '') . ">39</option>
                    <option value='40' " . ($produto['tamanho'] == '40' ? 'selected' : '') . ">40</option>
                    <option value='41' " . ($produto['tamanho'] == '41' ? 'selected' : '') . ">41</option>
                    <option value='42' " . ($produto['tamanho'] == '42' ? 'selected' : '') . ">42</option>
                </select>
                <button type='submit' name='action' value='update' class='button-link'>Atualizar</button>
                <button type='submit' name='action' value='remove' class='button-link'>Remover</button>
              </div>";
    }
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}
?>
