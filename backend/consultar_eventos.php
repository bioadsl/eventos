<?php
require_once('Conn.php'); // Certifique-se de incluir o arquivo que contém sua classe Conn

// Crie uma instância da classe Conn para obter a conexão com o banco de dados
$conn = new Conn();
$mysqli = $conn->getConexao();

// Consulta para listar eventos
$query = "SELECT id, nome_evento, data_inicio FROM Eventos";
$result = $mysqli->query($query);

$eventos = array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }
}

// Feche a conexão com o banco de dados
$conn->fecharConexao();

// Retorna os eventos em formato JSON
echo json_encode($eventos);
?>
