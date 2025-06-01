<?php
require_once 'init.php';

$id = $_POST['id'];
$marca = $_POST['marca'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];

$PDO = db_connect();
$sql = "UPDATE usuarios SET marca = :marca, nome = :nome, tipo = :tipo, descricao = :descricao WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':marca', $marca);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibir.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
