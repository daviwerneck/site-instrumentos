<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>CRUD PDO</title>
</head>
<body>
    <!-- EXIBIR O MENU -->
    <div class="container">
        <div class="jumbotron text-center">
            <p class="h4">Editar Compras</p>
        </div>

        <form action="editCompra.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="data">Data:</label>
                        <input type="text" class="form-control" name="data" value="<?php echo $comp['data_compra']; ?>" required>
                    </div>
                </div>
                <label for="produto">Produto:</label>
                <input type="select" id="produto_id" name="produto" required>

                <label for="usuario">Usuário:</label>
                <input type="select" id="usuario_id" name="usuario_id" required>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
        </form>
    </div>

</body>
<script>
function formatar(mascara, documento) {
  let i = documento.value.length;
  let saida = mascara.substring(0, 1);
  let texto = mascara.substring(i);
  if (texto.substring(0, 1) != saida && texto.length) {
    documento.value += texto.substring(0, 1);
  }
}
</script>
</html>
