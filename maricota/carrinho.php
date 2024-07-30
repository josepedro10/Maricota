<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maricota</title>
</head>
<body>
<ul>
        <?php
        // Define uma lista de itens
        $itens = ['Item 1', 'Item 2', 'Item 3', 'Item 4'];

        // Exibe cada item da lista
        foreach ($itens as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </ul>
    <form action="carrinho.php" method="post">
    <button type="submit" class="button-link">Ver Lista de Itens</button>
    </form>
</body>
</html>