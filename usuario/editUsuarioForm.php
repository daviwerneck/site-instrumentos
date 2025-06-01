<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

$PDO = db_connect();
$sql = "SELECT id_usuario, cpf, nome, email, endereco, telefone, dataNascimento FROM usuarios WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if (!is_array($user)) {
    header('Location: exibirUsuario.php');
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
            <p class="h4">Edição de Usuários</p>
        </div>

        <form action="editUsuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" name="nome" maxlength="50" value="<?php echo $user['nome']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" maxlength="50" value="<?php echo $user['email']; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" name="cpf" maxlength="14"
                            onkeypress="formatar('###.###.###-##', this)" value="<?php echo $user['cpf']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" maxlength="50" value="<?php echo $user['cpf']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" name="cpf" maxlength="14"
                            onkeypress="formatar'(##)#####-####', this)" value="<?php echo $user['telefone']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="dataNascimento" style="width: 50%;"
                        value="<?php echo $user['dataNascimento']; ?>" required>
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
