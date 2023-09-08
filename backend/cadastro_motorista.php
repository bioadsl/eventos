<?php
require_once('Conn.php'); // Certifique-se de incluir o arquivo que contém sua classe Conn

// Obtenha os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];

// Crie uma instância da classe Conn para obter a conexão com o banco de dados
$conn = new Conn();
$mysqli = $conn->getConexao();

// Insira os dados na tabela de Motoristas
$query = "INSERT INTO Motoristas (nome, email, celular) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sss", $nome, $email, $celular);

if ($stmt->execute()) {
    echo "Motorista cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar motorista: " . $stmt->error;
}

// Feche a conexão com o banco de dados
$stmt->close();
$conn->fecharConexao();
?>
