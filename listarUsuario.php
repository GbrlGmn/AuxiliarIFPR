<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "ifpr");
// prepara o SQL
$sql = "SELECT * FROM usuario";
// executa o SQL
$resultado = $conexao->query($sql);
// checa a conexão
if ($conexao->connect_error) {
  die("Falha na conexão: " . $conexao->connect_error);
}

if(isset($_GET['id'])){
  $sql = "DELETE FROM usuario WHERE id = " . $_GET['id'];
  $conexao->query($sql);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
    body {
      background: #f8f9fa;
    }
    .page-header {
      border-bottom: 1px solid #dee2e6;
    }
    .table-actions a {
      min-width: 95px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 page-header">
      <div>
        <h1 class="h3 mb-1">Listar Usuários</h1>
        <p class="text-muted mb-0">Visualize, edite ou exclua registros de usuários cadastrados.</p>
      </div>
      <a class="btn btn-primary btn-sm" href="cadastrarUsuario.php">Novo Usuário</a>
    </div>

    <div class="card shadow-sm">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-end">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($resultado && $resultado->num_rows > 0) : ?>
                <?php while ($linha = mysqli_fetch_array($resultado)) : ?>
                  <tr>
                    <th scope="row"><?php echo $linha['id']; ?></th>
                    <td><?php echo htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($linha['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="text-end table-actions">
                      <a class="btn btn-sm btn-outline-primary me-2" href="editarUsuario.php?id=<?php echo $linha['id']; ?>">Editar</a>
                      <a class="btn btn-sm btn-outline-danger" href="excluirUsuario.php?id=<?php echo $linha['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else : ?>
                <tr>
                  <td colspan="4" class="text-center py-4">
                    Nenhum usuário encontrado.
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>