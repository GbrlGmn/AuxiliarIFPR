<?php
$mensagem = "";

$conexao = mysqli_connect("localhost", "root", "", "ifpr");

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $status = $_POST["status"];

    $sql = "INSERT INTO produto (nome, descricao, preco, status) 
            VALUES ('$nome', '$descricao', '$preco', '$status')";

    if (mysqli_query($conexao, $sql)) {
    $mensagem = "Produto cadastrado com sucesso!";
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
    <title>Cadastro de Produto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <div class="card">
        <div class="card-body">

            <h1 class="mb-4">Cadastro de Clientes</h1>

            <form action="" method="post">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="preco" class="form-label">Preço:</label>
                    <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="disponivel">Disponível</option>
                        <option value="indisponivel">Indisponível</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-check-square-fill"></i>
                    Cadastrar
                </button>

            </form>

            <?php if ($mensagem != "") { ?>
                <div class="alert alert-success mt-3" role="alert"><i class="bi bi-check-square-fill"></i>
                    <?php echo $mensagem; ?>
                </div>
            <?php } ?>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

