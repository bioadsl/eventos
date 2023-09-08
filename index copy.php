
<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
require_once('backend/DatabaseManager.php'); // Certifique-se de que o arquivo DatabaseManager.php esteja incluído corretamente.

$databaseManager = new DatabaseManager();

// Consulta para obter o número de usuários confirmados
$queryUsuariosConfirmados = "SELECT COUNT(*) as totalUsuarios FROM Presencas";
$resultUsuariosConfirmados = $databaseManager->conn->query($queryUsuariosConfirmados);
$rowUsuariosConfirmados = $resultUsuariosConfirmados->fetch_assoc();
$numeroUsuariosConfirmados = $rowUsuariosConfirmados['totalUsuarios'];

// Consulta para obter o número de vagas disponíveis
$queryVagasDisponiveis = "SELECT SUM(vagas_disponiveis) as totalVagas FROM Eventos";
$resultVagasDisponiveis = $databaseManager->conn->query($queryVagasDisponiveis);
$rowVagasDisponiveis = $resultVagasDisponiveis->fetch_assoc();
$numeroVagasDisponiveis = $rowVagasDisponiveis['totalVagas'];

// Consulta para obter o número de viagens cadastradas
$queryViagensCadastradas = "SELECT COUNT(*) as totalViagens FROM Viagens";
$resultViagensCadastradas = $databaseManager->conn->query($queryViagensCadastradas);
$rowViagensCadastradas = $resultViagensCadastradas->fetch_assoc();
$numeroViagensCadastradas = $rowViagensCadastradas['totalViagens'];

$eventos = $databaseManager->listarEventos();
$numeroEventosCadastrados = count($eventos);

$databaseManager->fecharConexao();

?>

<!DOCTYPE html>
<html>
<head>
    <title> Tela Inicial</title>
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
<div class="mt-5" > 
    <h1 style="margin-left:2%;"> Tela Inicial</h1>

    <div class="card text-center">
            <div class="card-header">
            <h5 class="card-title">Eventos Vigentes</h5>
            </div>
            <div class="card-body">
            <p class="card-text">Número de Eventos: <?php echo $numeroEventosCadastrados; ?></p>
            <p class="card-text">Número de Usuários Confirmados: <?php echo $numeroUsuariosConfirmados; ?></p>
            <p class="card-text">Número de Vagas Disponíveis: <?php echo $numeroVagasDisponiveis; ?></p>
            <a href="cadastro_eventos.html" class="btn btn-primary">Cadastro</a>
            <a href="consulta_eventos.php" class="btn btn-secondary">Consulta</a>
            <a href="inscricao_evento.php" class="btn btn-success">Inscrição</a>
        </div>
    </div>

    <div class="card text-center">
            <div class="card-header">
            <h5 class="card-title">Viagens</h5>
            </div>
            <div class="card-body">
            <p class="card-text">Número de Viagens Cadastradas: <?php echo $numeroViagensCadastradas; ?></p>
            <a href="cadastro_viagens.html" class="btn btn-primary">Cadastro</a>
            <a href="consulta_viagens.php" class="btn btn-secondary">Consulta</a>
            <a href="reserva_viagens.php" class="btn btn-success">Reserva</a>
        </div>
    </div>

    <!-- Card 2: Cadastro de Usuários -->
    <div class="card text-center">
            <div class="card-header">
            <h5 class="card-title">Usuários</h5>
            </div>
            <div class="card-body">
            <a href="cadastro_usuarios.html" class="btn btn-primary">Cadastro</a>
            <a href="consulta_usuarios.php" class="btn btn-secondary">Consulta</a>
        </div>
    </div>

    <!-- Card 3: Cadastro de Motoristas -->
    <div class="card text-center">
            <div class="card-header">
            <h5 class="card-title">Motoristas</h5>
            </div>
            <div class="card-body">
            <a href="cadastro_motoristas.html" class="btn btn-primary">Cadastro</a>
            <a href="consulta_motoristas.php" class="btn btn-secondary">Consulta</a>
            <a href="aceite_viagens.php" class="btn btn-success">Aceite</a>
        </div>
    </div>

    <!-- Card 4: Consulta de Viagens -->
    <!-- <div class="card text-center">
            <div class="card-header">
            <h5 class="card-title">Viagens</h5>
            </div>
            <div class="card-body">
            <p class="card-text">Número de Viagens Cadastradas: Z</p>
            <a href="cadastro_viagens.html" class="btn btn-primary">Novo</a>
            <a href="consulta_viagens.php" class="btn btn-secondary">Ver Viagens</a>
        </div>
    </div> -->

</div>
    <!-- Script JavaScript para interações da tela inicial (opcional) -->
    <script>
        // Você pode adicionar scripts JavaScript aqui, se necessário.
    </script>
</body>
</html>
