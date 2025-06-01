<?php
require_once '../init.php';

$conn = conectar();
$id = isset($_GET['id_produto']) ? $_GET['id_produto'] : null;

if (empty($id)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Produto WHERE id_produto = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirProduto.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>
