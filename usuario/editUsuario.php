<?php
require_once 'init.php';

$id = $_POST['id'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$dataNascimento = $_POST['dataNascimento'];

$PDO = db_connect();
$sql = "UPDATE usuarios SET cpf = :cpf, nome = :nome, email = :email, telefone = :telefone, dataNascimento = :dataNascimento WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':dataNascimento', $dataNascimento);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: exibir.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>
