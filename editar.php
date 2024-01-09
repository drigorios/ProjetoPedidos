<?php
// Conecta ao banco de dados usando PDO
$host = 'localhost';
$dbname = 'pedidos';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados" . $e->getMessage());
}
// verfica o parametro do id
if (!isset($_GET['id'])) {
    header('Location:index.php');
    exit();
}
//obter os dados do pedido
$id = $_GET['id'];

//buscar os pedidos na base de dados

$sql = "SELECT * FROM pedidos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$pedido = $stmt->fetch();
//verificar se os dados do pedido estão corretos
if (!$pedido) {
    header('Location: index.php');
    exit();
}
// verifica se o pedido foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
}
// atualizar os dados da tabela pedidos
    $sql = "UPDATE pedidos SET data = :data, cliente=:cliente, produto=:produto, valor=:valor WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':cliente', $cliente);
    $stmt->bindValue(':produto', $produto);
    $stmt->bindValue(':valor', $valor);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    // depois de salvar vai pra página inicial
    header('Location:index.php');
    exit();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form action="editar.php?id=">
        <h1>Editar Pedido</h1>
        <form action="editar.php?id=<?php echo $id; ?>" method="post">
            <label for="data">Data:</label>
            <input type="datetime-local" name="data" id="data" value="<?php echo $pedido['data']; ?>">
            <label for="cliente">Cliente:</label>
            <input type="text" name="cliente" id="cliente" value="<?php echo $pedido['cliente']; ?>">
            <label for="produto">Produto:</label>
            <input type="text" name="produto" id="produto" value="<?php echo $pedido['produto']; ?>">
            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" value="<?php echo $pedido['valor']; ?>">
            <input type="submit" value="Salvar Alterações">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>