<?php
require_once '../init.php';

$conn = conectar();
$id = isset($_GET['id_compra']) ? $_GET['id_compra'] : null;

if (empty($id)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Compra WHERE id_compra = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirCompra.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>
