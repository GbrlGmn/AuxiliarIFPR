<?php
$mensagem = "";

$conexao = mysqli_connect("localhost", "root", "", "ifpr");

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO usuario (nome, email, senha) 
            VALUES ('$nome', '$email', '$password')";

    if (mysqli_query($conexao, $sql)) {
    $mensagem = "Cliente cadastrado com sucesso!";
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
    <title>Cadastro de Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <div class="card">
        <div class="card-body">

            <h1 class="mb-4">Cadastro de Usuário</h1>

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
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
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

