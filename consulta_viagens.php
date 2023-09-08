<?php
//   ini_set('display_errors',1);
//   ini_set('display_startup_erros',1);
//   error_reporting(E_ALL);
require_once('backend/DatabaseManager.php');

$databaseManager = new DatabaseManager();
$viagens = $databaseManager->listarViagens();
$databaseManager->fecharConexao();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Viagens</title>
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
    <h1>Consulta de Viagens</h1>

   <!-- Tabela de Viagens Cadastradas -->
   <table class="table">
        <thead>
            <tr>
                <th>Nome do Evento</th>
                <th>Data da Viagem</th>
                <th>Valor da Passagem</th>
                <th>Número de Viagens</th>
                <th>Vagas Disponíveis Ida</th>
                <th>Vagas Disponíveis Volta</th>
                <th>Partida</th>
                <th>Volta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viagens as $viagem): ?>
                <tr>
                    <td><?php echo $viagem['nome_evento']; ?></td>
                    <td><?php echo $viagem['data_viagem']; ?></td>
                    <td>R$ <?php echo number_format($viagem['valor_passagem'], 2, ',', '.'); ?></td>
                    <td><?php echo $viagem['numero_viagens']; ?></td>
                    <td><?php echo $viagem['vagas_disponiveis_ida']; ?></td>
                    <td><?php echo $viagem['vagas_disponiveis_volta']; ?></td>
                    <td><?php echo $viagem['partida']; ?></td>
                    <td><?php echo $viagem['volta']; ?></td>
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