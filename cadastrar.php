<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class= gg>
    <div class="container">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h1>Cadastro de Clientes</h1>
                <form action="cadastrar.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
        </form>
    </div>
    </div>
</body>
</html>

<?php
    $conexao = mysqli_connect("localhost", "root", "", "ifpr");
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$password')";
        if (mysqli_query($conexao, $sql)) {
            echo "Cliente cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
        }
    }
    ?>