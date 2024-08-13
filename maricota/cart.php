<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_size = $_POST['product_size'];

    if ($_POST['action'] == 'add') {
        $cart_key = $product_id . '_' . $product_size;
        if (isset($_SESSION['cart'][$cart_key])) {
            $_SESSION['cart'][$cart_key]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$cart_key] = array(
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $quantity,
                'size' => $product_size
            );
        }
    } elseif ($_POST['action'] == 'update') {
        $cart_key = $_POST['cart_key'];
        $_SESSION['cart'][$cart_key]['quantity'] = $quantity;
        $_SESSION['cart'][$cart_key]['size'] = $product_size;
    } elseif ($_POST['action'] == 'remove') {
        $cart_key = $_POST['cart_key'];
        unset($_SESSION['cart'][$cart_key]);
    }
}

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart_key => $product) {
        echo "<div class='cart-item'>
                <p>{$product['name']} - Tamanho: {$product['size']} - Preço: {$product['price']} - Quantidade: {$product['quantity']}</p>
                <input type='hidden' name='cart_key' value='$cart_key'>
                <label for='quantity_{$cart_key}'>Quantidade:</label>
                <input type='number' id='quantity_{$cart_key}' name='quantity' value='{$product['quantity']}' min='1'>
                <label for='size_{$cart_key}'>Tamanho:</label>
                <select id='size_{$cart_key}' name='product_size'>
                    <option value='34' " . ($product['size'] == '34' ? 'selected' : '') . ">34</option>
                    <option value='35' " . ($product['size'] == '35' ? 'selected' : '') . ">35</option>
                    <option value='36' " . ($product['size'] == '36' ? 'selected' : '') . ">36</option>
                    <option value='37' " . ($product['size'] == '37' ? 'selected' : '') . ">37</option>
                    <option value='38' " . ($product['size'] == '38' ? 'selected' : '') . ">38</option>
                    <option value='39' " . ($product['size'] == '39' ? 'selected' : '') . ">39</option>
                    <option value='40' " . ($product['size'] == '40' ? 'selected' : '') . ">40</option>
                    <option value='41' " . ($product['size'] == '41' ? 'selected' : '') . ">41</option>
                    <option value='42' " . ($product['size'] == '42' ? 'selected' : '') . ">42</option>
                </select>
                <button type='submit' name='action' value='update' class='button-link'>Atualizar</button>
                <button type='submit' name='action' value='remove' class='button-link'>Remover</button>
              </div>";
    }
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}
?>