<?php
// Connect
$host = 'localhost';
$dbname = 'pedidos';
$username = 'root';
$password = '';
// Try
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados" . $e->getMessage());
}
// Verify
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    // Insert
    $sql = "INSERT INTO pedidos (data,cliente,produto,valor) VALUES (:data,:cliente,:produto,:valor)";
    $stmt = $pdo->prepare($sql);
    $stmt-> bindValue(':data', $data);
    $stmt-> bindValue(':cliente', $cliente);
    $stmt-> bindValue(':produto', $produto);
    $stmt-> bindValue(':valor', $valor);
    $stmt->execute();
}
    //exit
    header('Location:index.php');
    exit();
?>
