<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "ifpr");
if ($conexao->connect_error) {
	die("Falha na conexão: " . $conexao->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$id = (int) $_GET['id'];
	$sql = "DELETE FROM usuario WHERE id = $id";
	$conexao->query($sql);
}

header("Location: listarUsuario.php");
exit;
?>
