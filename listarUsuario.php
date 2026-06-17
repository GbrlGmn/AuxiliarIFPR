<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "ifpr");
// prepara o SQL
$sql = "SELECT * FROM usuario";
//exercuta o SQL
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
</head>
<body>
    
    <div class="container">
        <h1>Listar Usuario</h1> <a class="btn btn-primary" href="cadastrarUsuario.php">Cadastrar</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php  while($linha = mysqli_fetch_array($resultado)) { ?>
    <tr>
      <th scope="row"><?php echo $linha['id']; ?></th>
      <td><?php echo $linha['nome']; ?></td>
      <td><?php echo $linha['email']; ?></td>
      <td><a class="btn btn-primary" href="editarUsuario.php?id=<?php echo $linha['id']; ?>">Editar</a>
        <a class="btn btn-danger"href="excluirUsuario.php?id=<?php echo $linha['id']; ?>">Excluir</a></td>
      
       
    </tr>
 <?php } ?>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>