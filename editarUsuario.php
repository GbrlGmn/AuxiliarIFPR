<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "ifpr");
if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Usuário</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <style>
                body { background: #f8f9fa; }
                .page-header { border-bottom: 1px solid #dee2e6; }
        </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 page-header">
            <div>
                <h1 class="h3 mb-1">Editar Usuário</h1>
                <p class="text-muted mb-0">Altere os dados do usuário e salve as modificações.</p>
            </div>
            <a class="btn btn-secondary btn-sm" href="listarUsuario.php">Voltar</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listarUsuario.php" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>