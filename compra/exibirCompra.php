<?php
require_once 'init.php';

$PDO = db_connect();
$sql = "SELECT id_compra, data_compra, id_usuario, id_produto FROM compra WHERE id = :id";
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
    <h5 class="card-title" style="text-align: center;">Exibição de Compras</h5>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Código da Compra</th>
          <th>Data</th>
          <th>Código do Usuário</th>
          <th>Código do Produto</th>
          <th style="text-align: center;" colspan="2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($comp = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?php echo $comp['id_compra']; ?></td>
          <td><?php echo $comp['data_compra']; ?></td>
          <td><?php echo $comp['id_usuario']; ?></td>
          <td><?php echo $comp['id_produto']; ?></td>
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
