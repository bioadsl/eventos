<?php
require_once('Conn.php'); // Certifique-se de incluir o arquivo que contém sua classe Conn

// Obtenha os dados do formulário (substitua com todos os campos necessários)
$nomeEvento = $_POST['nome_evento'];
$vagasDisponiveis = $_POST['vagas_disponiveis'];
$dataInicio = $_POST['data_inicio'];
$dataFinal = $_POST['data_final'];
$numeroDias = $_POST['numero_dias'];
$horarioInicio = $_POST['horario_inicio'];
$horarioFinal = $_POST['horario_final'];
$endereco = $_POST['endereco'];
$localizacao = $_POST['localizacao'];
$nomeContato = $_POST['nome_contato'];
$telefoneContato = $_POST['telefone_contato'];

// Crie uma instância da classe Conn para obter a conexão com o banco de dados
$conn = new Conn();
$mysqli = $conn->getConexao();

// Insira os dados na tabela de Eventos
$query = "INSERT INTO Eventos (nome_evento, vagas_disponiveis, data_inicio, data_final, numero_dias, horario_inicio, horario_final, endereco, localizacao, nome_contato, telefone_contato) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sisssssssss", $nomeEvento, $vagasDisponiveis, $dataInicio, $dataFinal, $numeroDias, $horarioInicio, $horarioFinal, $endereco, $localizacao, $nomeContato, $telefoneContato);

if ($stmt->execute()) {
    echo "Evento cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar evento: " . $stmt->error;
}

// Feche a conexão com o banco de dados
$stmt->close();
$conn->fecharConexao();
?>
