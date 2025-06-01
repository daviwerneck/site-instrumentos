<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

$PDO = db_connect();
$sql = "SELECT id_produto, marca, nome, tipo, descricao FROM Produto WHERE id = :id_produto";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_produto', $id, PDO::PARAM_INT);
$stmt->execute();
$prod = $stmt->fetch(PDO::FETCH_ASSOC);


if (!is_array($prod)) {
    header('Location: exibir.php');
    exit;
}
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
    <!-- EXIBIR O MENU -->
    <div class="container">
        <div class="jumbotron text-center">
            <p class="h4">Edição de Produtos</p>
        </div>

        <form action="editProduto.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input type="text" class="form-control" name="marca" maxlenght="20" value="<?php echo $prod['marca']; ?>" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" maxlenght='50' value="<?php echo $prod['nome']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <input type="text" class="form-control" name="tipo" maxlength="50"
                            value="<?php echo $prod['tipo']; ?>" required>
                    </div>
                </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" name="descricao" maxlenght="200"
                        value="<?php echo $prod['descricao']; ?>" required>
                </div>
            </div>
        </div>
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
