<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once('backend/DatabaseManager.php');

$databaseManager = new DatabaseManager();

$usuarios = $databaseManager->listarUsuarios();
$viagens = $databaseManager->listarViagens();
$vagasDisponiveis = [];

// Certifique-se de que $viagemId esteja definido antes de chamar listarVagasDisponiveis
$viagemId = isset($_GET['viagemId']) ? $_GET['viagemId'] : null;

if ($viagemId !== null) {
    $vagasDisponiveis = $databaseManager->listarVagasDisponiveis($viagemId);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscrição no Evento</title>
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
    <h1>Inscrição no Evento</h1>

    <!-- Lista de Eventos -->
    <div class="form-group">
        <label for="evento">Selecione o Evento:</label>
        <select class="form-control" id="evento" name="evento">
            <option value="" disabled selected>Selecione o Evento</option>
            <?php
            // Conecte-se ao banco de dados e recupere os nomes dos eventos
            $eventos = $databaseManager->listarEventos();
            
            foreach ($eventos as $evento) {
                echo '<option value="' . $evento['evento_id'] . '">' . $evento['nome_evento'] . '</option>';
            }
            ?>
        </select>
    </div>

    <!-- Lista de Usuários -->
    <div class="form-group">
        <label for="usuario">Selecione o Usuário:</label>
        <select class="form-control" id="usuario" name="usuario">
            <option value="" disabled selected>Selecione o Usuário</option>
            <?php
            // Conecte-se ao banco de dados e recupere os nomes dos usuários
            $usuarios = $databaseManager->listarUsuarios();
            
            foreach ($usuarios as $usuario) {
                echo '<option value="' . $usuario['usuario_id'] . '">' . $usuario['nome'] . '</option>';
            }
            ?>
        </select>
    </div>

    <!-- Campo para Informar se Vai de Ônibus ou Carro Próprio -->
    <div class="form-group">
        <label for="transporte">Como você vai ao evento?</label>
        <select class="form-control" id="transporte" name="transporte">
            <option value="onibus">Ônibus</option>
            <option value="carro">Carro Próprio</option>
        </select>
    </div>

    <!-- Lista de Viagens Disponíveis -->
    <div class="form-group">
        <label for="viagem">Selecione a Viagem de Ônibus:</label>
        <select class="form-control" id="viagem" name="viagem">
            <option value="" disabled selected>Selecione a Viagem</option>
            <?php
            // Conecte-se ao banco de dados e recupere as informações das viagens
            foreach ($viagens as $viagem) {
                echo '<option value="' . $viagem['viagem_id'] . '">' . $viagem['nome_evento'] . ' - ' . $viagem['data_viagem'] . '</option>';
            }
            ?>
        </select>
    </div>

    <!-- Lista de Vagas Disponíveis no Ônibus -->
    <div class="form-group">
        <label for="vagas_disponiveis">Selecione as Vagas no Ônibus:</label>
        <select class="form-control" id="vagas_disponiveis" name="vagas_disponiveis">
            <option value="" disabled selected>Selecione as Vagas</option>
            <?php
                $usuarios = $databaseManager->listarVagasDisponiveis($viagem['viagem_id']);
            // Preencha o select com as vagas disponíveis
            foreach ($vagasOnibus as $viagem) {
                echo '<option value="' . $viagem['evento_id'] . '">' . $viagem['vagas_disponiveis_ida'] . ' - ' . $viagem['vagas_disponiveis_ida'] . '</option>';
            }
            ?>
        </select>
    </div>

    <!-- Botão de Envio -->
    <button type="submit" class="btn btn-primary">Enviar</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Função para carregar as vagas disponíveis no ônibus
        function carregarVagasOnibus() {
            var selectVagas = $("#vagas_disponiveis");
            selectVagas.empty(); // Limpa as opções existentes

            // Obtenha o valor selecionado no campo de seleção de viagens
            var viagemId = $("#viagem").val();

            // Aqui você deve fazer uma requisição AJAX para obter as vagas disponíveis do servidor
            $.get("inscricao_evanto?viagemId=" + viagemId, function (data) {
                var vagas = JSON.parse(data);

                // Preenche o select com as vagas disponíveis
                $.each(vagas, function (index, vaga) {
                    selectVagas.append($("<option>", {
                        value: vaga.id,
                        text: vaga.numero
                    }));
                });
            });
        }

        // Chame a função para carregar as vagas quando a página carregar
        $(document).ready(function () {
            carregarVagasOnibus();

            // Adicione um evento que captura a mudança na seleção da viagem
            $("#viagem").change(function () {
                carregarVagasOnibus(); // Atualize as vagas disponíveis quando a viagem for alterada
            });
        });
    </script>
</body>
</html>
