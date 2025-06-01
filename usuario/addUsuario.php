<?php
require_once 'init.php';

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$dataNascimento = $_POST['dataNascimento'];

$PDO = db_connect();
$sql = "INSERT INTO Usuario (cpf, nome, email, endereco, telefone, dataNascimento) 
        VALUES (:cpf, :nome, :email, :endereco, :telefone, :dataNascimento)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':dataNascimento', $dataNascimento);

if ($stmt->execute()) {
    header('Location: exibirUsuario.php');
    exit;
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
