<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
require_once('backend/DatabaseManager.php');

$databaseManager = new DatabaseManager();
$usuarios = $databaseManager->listarUsuarios();
$databaseManager->fecharConexao();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Usuarios</title>
    <!-- Inclua os arquivos Bootstrap CSS e outros recursos necessários -->
    <script src="assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="Assets/css/css@3">
    <link href="Assets/css/dist/bootstrap.min.css" rel="stylesheet">
    <link href="Assets/css/sign-in.css" rel="stylesheet">
</head>
<body>
    <h1>Consulta de Usuarios</h1>

   <!-- Tabela de Viagens Cadastradas -->
   <table class="table">
        <thead>
            <tr>
            <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['usuario_id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['celular']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Script JavaScript para interações da página de consulta de viagens (opcional) -->
    <script>
        // Você pode adicionar scripts JavaScript aqui, se necessário.
    </script>
</body>
</html>