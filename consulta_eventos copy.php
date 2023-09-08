<?php
//   ini_set('display_errors',1);
//   ini_set('display_startup_erros',1);
//   error_reporting(E_ALL);

require_once('backend/DatabaseManager.php');

$databaseManager = new DatabaseManager();
$eventos = $databaseManager->listarEventos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Eventos</title>
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
    <h1>Consulta de Eventos</h1>
    
    <!-- Tabela de Eventos Cadastrados -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Evento</th>
                <th>Vagas Disponíveis</th>
                <th>Data de Início</th>
                <th>Data de Término</th>
                <th>Número de Dias</th>
                <th>Horário de Início</th>
                <th>Horário de Término</th>
                <th>Endereço</th>
                <th>Localização</th>
                <th>Nome de Contato</th>
                <th>Telefone de Contato</th>
                <th>Viagens Relacionadas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?php echo $evento['evento_id']; ?></td>
                    <td><?php echo $evento['nome_evento']; ?></td>
                    <td><?php echo $evento['vagas_disponiveis']; ?></td>
                    <td><?php echo $evento['data_inicio']; ?></td>
                    <td><?php echo $evento['data_final']; ?></td>
                    <td><?php echo $evento['numero_dias']; ?></td>
                    <td><?php echo $evento['horario_inicio']; ?></td>
                    <td><?php echo $evento['horario_final']; ?></td>
                    <td><?php echo $evento['endereco']; ?></td>
                    <td><?php echo $evento['localizacao']; ?></td>
                    <td><?php echo $evento['nome_contato']; ?></td>
                    <td><?php echo $evento['telefone_contato']; ?></td>
                    <td>
                        <?php
                        // Consulta as viagens relacionadas a este evento
                        $viagens = $databaseManager->listarViagensPorEvento($evento['evento_id']);
                        
                        if (!empty($viagens)) {
                            foreach ($viagens as $viagem) {
                                echo "Data: " . $viagem['data_viagem'] . "<br>";
                                echo "Valor da Passagem: R$ " . $viagem['valor_passagem'] . "<br>";
                                echo "Número de Viagens: " . $viagem['numero_viagens'] . "<br>";
                                echo "Vagas Disponíveis Ida: " . $viagem['vagas_disponiveis_ida'] . "<br>";
                                echo "Vagas Disponíveis Volta: " . $viagem['vagas_disponiveis_volta'] . "<br><br>";
                            }
                        } else {
                            echo "Nenhuma viagem relacionada a este evento.";
                        }
                        
                        ?>
                    </td>
                </tr>
            <?php  endforeach; ?>
            <?php $databaseManager->fecharConexao(); ?>
        </tbody>
    </table>

    <!-- Script JavaScript para interações da página de consulta de eventos (opcional) -->
    <script>
        // Você pode adicionar scripts JavaScript aqui, se necessário.
    </script>
</body>
</html>
