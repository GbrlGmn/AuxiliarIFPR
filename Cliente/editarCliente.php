// Cliente/editarCliente.php
<?php
$conexao = new mysqli("localhost", "root", "", "ifpr");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$id = $_GET['id'] ?? '';
$nome = '';
$cpfcnpj = '';
$telefone = '';
$email = '';
$cidade = '';
$endereco = '';
$estado = '';
$observacao = '';
$mensagem = '';

if ($id) {
    $sql = "SELECT * FROM cliente WHERE id = $id";
    $resultado = $conexao->query($sql);
    
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $nome = $linha['nome'];
        $cpfcnpj = $linha['cpfcnpj'];
        $telefone = $linha['telefone'];
        $email = $linha['email'];
        $cidade = $linha['cidade'];
        $endereco = $linha['endereco'];
        $estado = $linha['estado'];
        $observacao = $linha['observacao'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];
    $observacao = $_POST['observacao'];
    
    $sql = "UPDATE cliente SET nome = '$nome', cpfcnpj = '$cpfcnpj', telefone = '$telefone', email = '$email', cidade = '$cidade', endereco = '$endereco', estado = '$estado', observacao = '$observacao' WHERE id = $id";
    
    if ($conexao->query($sql)) {
        header("Location: listarCliente.php");
    } else {
        $mensagem = "Erro: " . $conexao->error;
    }
}

$estados = ['AC' => 'Acre (AC)', 'AL' => 'Alagoas (AL)', 'AP' => 'Amapá (AP)', 'AM' => 'Amazonas (AM)', 'BA' => 'Bahia (BA)', 'CE' => 'Ceará (CE)', 'DF' => 'Distrito Federal (DF)', 'ES' => 'Espírito Santo (ES)', 'GO' => 'Goiás (GO)', 'MA' => 'Maranhão (MA)', 'MT' => 'Mato Grosso (MT)', 'MS' => 'Mato Grosso do Sul (MS)', 'MG' => 'Minas Gerais (MG)', 'PA' => 'Pará (PA)', 'PB' => 'Paraíba (PB)', 'PR' => 'Paraná (PR)', 'PE' => 'Pernambuco (PE)', 'PI' => 'Piauí (PI)', 'RJ' => 'Rio de Janeiro (RJ)', 'RN' => 'Rio Grande do Norte (RN)', 'RS' => 'Rio Grande do Sul (RS)', 'RO' => 'Rondônia (RO)', 'RR' => 'Roraima (RR)', 'SC' => 'Santa Catarina (SC)', 'SP' => 'São Paulo (SP)', 'SE' => 'Sergipe (SE)', 'TO' => 'Tocantins (TO)'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cliente</title>
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
                <h1 class="h3 mb-1">Editar Cliente</h1>
                <p class="text-muted mb-0">Altere os dados do cliente e salve as modificações.</p>
            </div>
            <a class="btn btn-secondary btn-sm" href="listarCliente.php">Voltar</a>
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
                        <label for="cpfcnpj" class="form-label">CPF/CNPJ</label>
                        <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" value="<?php echo htmlspecialchars($cpfcnpj); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="">-</option>
                            <?php foreach($estados as $key => $value): ?>
                                <option value="<?php echo $key; ?>" <?php echo ($estado == $key) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="observacao" class="form-label">Observação</label>
                        <textarea class="form-control" id="observacao" name="observacao" rows="4"><?php echo htmlspecialchars($observacao); ?></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="listarCliente.php" class="btn btn-outline-secondary">Cancelar</a>
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