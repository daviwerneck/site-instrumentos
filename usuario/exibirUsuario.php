<?php
require_once 'init.php';

$PDO = db_connect();
$sql = "SELECT id_usuario, cpf, nome, email, endereco, telefone FROM usuarios ORDER BY id_usuario ASC";
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>CRUD PDO</title>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- EXIBIR O MENU -->
    </nav>
  </div>

  <div class="container">
    <h5 class="card-title" style="text-align: center;">Exibição de Usuários</h5>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Código</th>
          <th>CPF</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Endereco</th>
          <th>Telefone</th>
          <th>Data de Nascimento</th>
          <th style="text-align: center;" colspan="2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['cpf']; ?></td>
          <td><?php echo $user['nome']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td><?php echo $user['endereco']; ?></td>
          <td><?php echo $user['telefone']; ?></td>
          <td><?php echo converteData($user['dataNascimento']); ?></td>
          <td>
            <a href="form-edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Editar</a>
            <a href="deletar.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza de que deseja remover?');" class="btn btn-danger">Remover</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
