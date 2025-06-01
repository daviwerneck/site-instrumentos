<?php
require_once 'init.php';

$id = $_POST['id'];
$data = $_POST['data'];
$produto = $_POST['produto_id'];
$usuario = $_POST['usuario_id'];

$PDO = db_connect();
$sql = "UPDATE usuarios SET data = :data, nome = :nome, produto = :produto, usuario = :usuario WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':produto', $produto);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirCompra.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
