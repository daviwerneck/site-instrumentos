<?php
require_once '../init.php';

$conn = conectar();
$id = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : null;

if (empty($id)) {
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Usuario WHERE id_usuario = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibirUsuario.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>
