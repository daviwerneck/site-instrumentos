<?php
require_once 'init.php';

$produto = $_POST['produto_id'];
$usuario = $_POST['usuario_id'];
$data = $_POST['data'];

$PDO = db_connect();
$sql = "INSERT INTO Compra (data_compra, id_usuario, id_produto) 
        VALUES (:data, :usuario, :produto)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':produto', $produto);

if ($stmt->execute()) {
    header('Location: exibirProduto.php');
    exit;
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
