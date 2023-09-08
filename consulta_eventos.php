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
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
<div class="mt-2" > 
    <h1 class="text-center">Consulta de Eventos</h1>

    <div class="py-5">
        <div class="container">
            <?php foreach ($eventos as $evento): ?>
            <div class="row hidden-md-up">
                <div class="col-md-4 mt-4>
                    <div class="card">
                        <div class="card-block">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $evento['nome_evento']; ?></h4>
                        </div>
                        <h6 class="card-subtitle text-muted mt-2">Contato: <?php echo $evento['nome_contato']; ?>
                         - <i class="bi bi-whatsapp"></i> <?php echo $evento['telefone_contato']; ?></h6>
                        <p class="card-text p-y-1">

                        Identificador: <?php echo $evento['evento_id']; ?> <br>
                        Vagas Disponíveis: <?php echo $evento['vagas_disponiveis']; ?> <br>
                        Data de Início: <?php echo $evento['data_inicio']; ?> <br>
                        Data de Término: <?php echo $evento['data_final']; ?> <br>
                        Número de Dias: <?php echo $evento['numero_dias']; ?> <br>
                        Horário de Início: <?php echo $evento['horario_inicio']; ?> <br>
                        Horário de Término: <?php echo $evento['horario_final']; ?> <br>
                        Endereço: <?php echo $evento['endereco']; ?> <br>
                        Localização: <?php echo $evento['localizacao']; ?> <br>
                        Nome de Contato: <?php echo $evento['nome_contato']; ?> <br>
                        Telefone de Contato:<?php echo $evento['telefone_contato']; ?> <br> <br>
                        <a href="inscricao_evento.php" class="btn btn-primary btn-sm">Inscrição</a><br><br>
                       
                        Viagens Relacionadas:
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
                                echo "<a href='reserva_viagens.php' class='btn btn-success btn-sm'>Reserva</a> <br><br>";
                            }
                            } else {
                                echo "Nenhuma viagem relacionada a este evento.";
                                echo "<br>";
                                echo "<br>";
                                echo "<hr>";
                            }
                        
                        ?>
                            <?php  endforeach; ?>
                            <?php $databaseManager->fecharConexao(); ?>


                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Script JavaScript para interações da página de consulta de eventos (opcional) -->
    <script>
        // Você pode adicionar scripts JavaScript aqui, se necessário.
    </script>
</body>
</html>
