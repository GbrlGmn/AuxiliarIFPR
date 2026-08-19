
<?php
$conexao = new mysqli("localhost", "root", "", "ifpr02");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$id = $_GET['id'] ?? '';
$nome = '';
$descricao = '';
$preco = '';
$status = '';
$mensagem = '';

if ($id) {
    $sql = "SELECT * FROM produto WHERE id = $id";
    $resultado = $conexao->query($sql);
    
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $nome = $linha['nome'];
        $descricao = $linha['descricao'];
        $preco = $linha['preco'];
        $status = $linha['status'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $status = $_POST['status'];
    
    $sql = "UPDATE produto SET nome = '$nome', descricao = '$descricao', preco = '$preco', status = '$status' WHERE id = $id";
    
    if ($conexao->query($sql)) {
        header("Location: listarProduto.php");
    } else {
        $mensagem = "Erro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body { background: #f8f9fa; }
        .page-header { border-bottom: 1px solid #dee2e6; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 page-header">
            <div>
                <h1 class="h3 mb-1">Editar Produto</h1>
                <p class="text-muted mb-0">Altere os dados do produto e salve as modificações.</p>
            </div>
            <a class="btn btn-secondary btn-sm" href="listarProduto.php">Voltar</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($descricao); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo $preco; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Ativo" <?php echo ($status == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                            <option value="Inativo" <?php echo ($status == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listarProduto.php" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
                <?php if ($mensagem != "") { ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i> <?php echo $mensagem; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>