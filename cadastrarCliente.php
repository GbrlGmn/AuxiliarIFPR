<?php
$mensagem = "";

$conexao = mysqli_connect("localhost", "root", "", "ifpr");

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $cpfcnpj = $_POST["cpfcnpj"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado"];
    $observacao = $_POST["observacao"];
    

    $sql = "INSERT INTO cliente (nome, cpfcnpj, telefone, email, cidade, endereco, estado, observacao) 
            VALUES ('$nome', '$cpfcnpj', '$telefone', '$email', '$cidade', '$endereco', '$estado', '$observacao')";
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

            <h1 class="mb-4">Cadastro de Cliente</h1>

            <form action="" method="post">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="cpfcnpj" class="form-label">CPF/CNPJ:</label>
                    <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" required> 
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" required>
                </div>
                <div class="mb-3">
                    <label for="observacao" class="form-label">Observação:</label>
                    <textarea class="form-control" id="observacao" name="observacao" rows="3" required></textarea>
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

