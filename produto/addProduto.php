<?php
require_once 'init.php';

$marca = $_POST['marca'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];

$PDO = db_connect();
$sql = "INSERT INTO Produto (marca, nome, tipo, descricao) 
        VALUES (:marca, :nome, :tipo, :descricao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':marca', $marca);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':descricao', $descricao);

if ($stmt->execute()) {
    header('Location: exibirProduto.php');
    exit;
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
