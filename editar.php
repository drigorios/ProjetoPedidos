<?php
//Connect

$host = 'localhost';
$dbname = 'pedidos';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados" . $e->getMessage());
}

if (!isset($_GET['id'])) {
    header('Location:index.php');
    exit();
}
//GET ID
$id = $_GET['id'];
//PEGAR PRODUTO DA TABELA
$sql = "SELECT * FROM pedidos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$pedido = $stmt->fetch();
//VERIFY
if (!$pedido) {
    header('Location:index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //GET DATA
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    //UPDATE DATA
    $sql = "UPDATE pedidos SET data = :data, cliente =:cliente, produto =:produto, valor =:valor WHERE id=:id";

    $stmt= $pdo->prepare($sql);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':cliente', $cliente);
    $stmt->bindValue(':produto', $produto);
    $stmt->bindValue(':valor', $valor);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('Location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
</head>

<body>
    <h1>Editar Pedido</h1>
    <form action="editar.php?id=<?php echo $id ?>" method="post">
        <label for="data">Data</label>
        <input type="date" name="data" value="<?php echo $pedido['data'] ?>" <br>
        <label for="cliente">Cliente</label>
        <input type="text" name="cliente" value="<?php echo $pedido['cliente'] ?>" <br>
        <label for="data">Produto</label>
        <input type="text" name="produto" value="<?php echo $pedido['produto'] ?>" <br>
        <label for="valor">valor</label>
        <input type="text" name="valor" value="<?php echo $pedido['valor'] ?>" <br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>

