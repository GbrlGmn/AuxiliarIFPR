
<?php
$conexao = new mysqli("localhost", "root", "", "ifpr02");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if(isset($_GET['id'])){
    $sql = "DELETE FROM produto WHERE id = " . $_GET['id'];
    $conexao->query($sql);
    header("Location: listarProduto.php");
}

$sql = "SELECT * FROM produto";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body { background: #f8f9fa; }
        .page-header { border-bottom: 1px solid #dee2e6; }
        .table-actions a { min-width: 95px; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 page-header">
            <div>
                <h1 class="h3 mb-1">Listar Produtos</h1>
                <p class="text-muted mb-0">Visualize, edite ou exclua registros de produtos cadastrados.</p>
            </div>
            <a class="btn btn-primary btn-sm" href="cadastrarProduto.php">Novo Produto</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultado && $resultado->num_rows > 0) : ?>
                                <?php while ($linha = mysqli_fetch_array($resultado)) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $linha['id']; ?></th>
                                        <td><?php echo htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars(substr($linha['descricao'], 0, 50), ENT_QUOTES, 'UTF-8'); ?>...</td>
                                        <td>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?></td>
                                        <td>
                                            <?php if($linha['status'] == 'Ativo'): ?>
                                                <span class="badge bg-success">Ativo</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inativo</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end table-actions">
                                            <a class="btn btn-sm btn-outline-primary me-2" href="editarProduto.php?id=<?php echo $linha['id']; ?>">Editar</a>
                                            <a class="btn btn-sm btn-outline-danger" href="listarProduto.php?id=<?php echo $linha['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4">Nenhum produto encontrado.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>