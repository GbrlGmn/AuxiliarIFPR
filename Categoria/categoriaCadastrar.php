// Categoria/cadastrarCategoria.php
<?php
$mensagem = "";

$conexao = mysqli_connect("localhost", "root", "", "ifpr02");

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];

    $sql = "INSERT INTO categoria (nome) VALUES ('$nome')";

    if (mysqli_query($conexao, $sql)) {
        $mensagem = "Categoria cadastrada com sucesso!";
    } else {
        $mensagem = "Erro: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="mb-4">Cadastro de Categoria</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Cadastrar</button>
                <a href="listarCategoria.php" class="btn btn-secondary">Voltar</a>
            </form>
            <?php if ($mensagem != "") { ?>
                <div class="alert alert-success mt-3" role="alert">
                    <i class="bi bi-check-square-fill"></i> <?php echo $mensagem; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>