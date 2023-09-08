
<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
require_once('backend/DatabaseManager.php'); // Certifique-se de que o arquivo DatabaseManager.php esteja incluído corretamente.

$databaseManager = new DatabaseManager();

// Consulta para obter o número de Motoristas 
$queryMotoristas = "SELECT COUNT(*) as totalMotoristas FROM Motoristas";
$resultMotoristas = $databaseManager->conn->query($queryMotoristas);
$rowMotoristas = $resultMotoristas->fetch_assoc();
$numeroMotoristas = $rowMotoristas['totalMotoristas'];

// Consulta para obter o número de usuários 
$queryUsuarios = "SELECT COUNT(*) as totalUsuarios FROM Usuarios";
$resultUsuarios = $databaseManager->conn->query($queryUsuarios);
$rowUsuarios = $resultUsuarios->fetch_assoc();
$numeroUsuarios = $rowUsuarios['totalUsuarios'];

// Consulta para obter o número de usuários confirmados
$queryUsuariosConfirmados = "SELECT COUNT(*) as totalUsuariosConfirmados FROM Presencas";
$resultUsuariosConfirmados = $databaseManager->conn->query($queryUsuariosConfirmados);
$rowUsuariosConfirmados = $resultUsuariosConfirmados->fetch_assoc();
$numeroUsuariosConfirmados = $rowUsuariosConfirmados['totalUsuariosConfirmados'];

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
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<body>

 

<div class="mt-2" > 
    <h1 class="text-center"> Eventos CAP</h1>


 <div class="py-1">
    <div class="container">
        <div class="row hidden-md-up">
    <!-- Card 1: Cadastro de Eventos -->
            <div class="col-md-4 mt-2">
                <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title">Eventos</h5>
                        </div>
                        <div class="card-body">
                        <p class="card-text">
                        <i class="bi bi-house"></i>   Eventos: <?php echo $numeroEventosCadastrados; ?> <br>
                        <i class="bi bi-person-check"></i>    Inscritos: <?php echo $numeroUsuariosConfirmados; ?> <br>
                        <i class="bi bi-person-plus"></i>   Vagas: <?php echo $numeroVagasDisponiveis - $numeroUsuariosConfirmados; ?>
                        </p>
                        <!-- <p class="card-text">Inscritos: <?php echo $numeroUsuariosConfirmados; ?></p>
                        <p class="card-text">Vagas: <?php echo $numeroVagasDisponiveis; ?></p> -->
                        <a href="cadastro_eventos.html" class="btn btn-primary btn-sm">Cadastro</a>
                        <a href="consulta_eventos.php" class="btn btn-secondary btn-sm">Consulta</a>
                        <a href="inscricao_evento.php" class="btn btn-success btn-sm">Inscrição</a>
                    </div>
                </div>
            </div>
    <!-- Card 2: Cadastro de Viagens -->  
            <div class="col-md-4 mt-2">    
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">Viagens</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><i class="bi bi-signpost-2"></i> Viagens: <?php echo $numeroViagensCadastradas; ?></p>
                        <a href="cadastro_viagens.html" class="btn btn-primary btn-sm">Cadastro</a>
                        <a href="consulta_viagens.php" class="btn btn-secondary btn-sm">Consulta</a>
                        <a href="reserva_viagens.php" class="btn btn-success btn-sm">Reserva</a>
                    </div>
                </div>
            </div>
    <!-- Card 3: Cadastro de Usuários -->
            <div class="col-md-4 mt-2">   
                <div class="card text-center">
                        <div class="card-header">
                        <h5 class="card-title">Usuários</h5>
                        </div>
                        <div class="card-body">
                        <p class="card-text">
                       <i class="bi bi-person"></i>  Usuarios: <?php echo $numeroUsuarios; ?> 
                        </p>
                        <a href="cadastro_usuarios.html" class="btn btn-primary btn-sm">Cadastro</a>
                        <a href="consulta_usuarios.php" class="btn btn-secondary btn-sm">Consulta</a>
                    </div>
                </div>
            </div>
    <!-- Card 4: Cadastro de Motoristas -->
            <div class="col-md-4 mt-2">  
                <div class="card text-center">
                        <div class="card-header">
                        <h5 class="card-title">Motoristas</h5>
                        </div>
                        <div class="card-body">
                        <p class="card-text">
                        <i class="bi bi-person-badge"></i>  Motoristas: <?php echo $numeroMotoristas; ?> 
                        </p>
                        <a href="cadastro_motoristas.html" class="btn btn-primary btn-sm">Cadastro</a>
                        <a href="consulta_motoristas.php" class="btn btn-secondary btn-sm">Consulta</a>
                        <a href="aceite_viagens.php" class="btn btn-success btn-sm">Aceite</a>
                    </div>
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
  </div>
</div>
    <!-- Script JavaScript para interações da tela inicial (opcional) -->
    <script>
        // Você pode adicionar scripts JavaScript aqui, se necessário.
    </script>
</body>
</html>
