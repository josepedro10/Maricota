<?php
session_start();

// Inicializa o carrinho se ele ainda não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Captura os dados do formulário para adicionar itens ao carrinho
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $tamanho = $_POST['tamanho'];
    $quantidade = $_POST['quantidade'];

    // Cria um item para o carrinho
    $item = array(
        'nome' => $nome,
        'preco' => $preco,
        'tamanho' => $tamanho,
        'quantidade' => $quantidade
    );

    // Adiciona o item ao carrinho
    $_SESSION['carrinho'][] = $item;
}

// Processa ações de remover ou atualizar o carrinho
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && isset($_POST['index'])) {
    $index = $_POST['index'];

    if ($_POST['action'] == 'remover') {
        // Remove o item do carrinho
        unset($_SESSION['carrinho'][$index]);
    } elseif ($_POST['action'] == 'atualizar') {
        // Atualiza a quantidade do item no carrinho
        $nova_quantidade = $_POST['quantidade'];
        $_SESSION['carrinho'][$index]['quantidade'] = $nova_quantidade;
    }

    // Reorganiza o array do carrinho após remoção de item
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
}

// Calcula o total do carrinho
$total = 0;

// Mostra os itens no carrinho
if (!empty($_SESSION['carrinho'])) {
    echo "<h2>Seu Carrinho</h2>";
    foreach ($_SESSION['carrinho'] as $index => $item) {
        // Calcula o subtotal do item
        $subtotal = $item['preco'] * $item['quantidade'];
        // Adiciona o subtotal ao total
        $total += $subtotal;

        echo "<div class='cart-item'>
                <p>{$item['nome']} - Tamanho: {$item['tamanho']} - Preço: R$ {$item['preco']} - Quantidade: {$item['quantidade']} - Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "</p>
                <form action='carrinho.php' method='post'>
                    <input type='hidden' name='index' value='{$index}'>
                    <label for='quantidade_{$index}'>Quantidade:</label>
                    <input type='number' id='quantidade_{$index}' name='quantidade' value='{$item['quantidade']}' min='1'>
                    <button type='submit' name='action' value='atualizar' class='button-link'>Atualizar</button>
                    <button type='submit' name='action' value='remover' class='button-link'>Remover</button>
                </form>
              </div>";
    }

    // Exibe o total do carrinho
    echo "<div class='cart-total'>
            <h3>Total do Carrinho: R$ " . number_format($total, 2, ',', '.') . "</h3>
          </div>";

    // Adiciona o botão de comprar
    echo "<form action='pagamento.php' method='post'>
            <button type='submit' class='button-link'>Comprar</button>
          </form>";
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}
?>
