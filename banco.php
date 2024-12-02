<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafeteria_gourmet";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para pegar os produtos
$sql = "SELECT id, nome, descricao, preco, imagem_url FROM produtos";
$result = $conn->query($sql);

// Verifica se há produtos no banco de dados
$produtos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Gourmet</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">
        <h1>Cafeteria Gourmet</h1>
    </div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </nav>
</header>

<section class="products">
    <h2>Produtos</h2>
    <div class="product-list">
        <?php foreach ($produtos as $produto): ?>
            <div class="product-card">
                <img src="<?= $produto['imagem_url'] ?>" alt="<?= $produto['nome'] ?>">
                <h3><?= $produto['nome'] ?></h3>
                <p><?= $produto['descricao'] ?></p>
                <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <button>Adicionar ao Carrinho</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<footer>
    <p>&copy; 2024 Cafeteria Gourmet | Todos os direitos reservados</p>
    <div class="social">
        <a href="#">Facebook</a>
        <a href="#">Instagram</a>
    </div>
</footer>

</body>
</html>
