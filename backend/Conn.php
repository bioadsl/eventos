<?php

class Conn {
    private $host = "localhost"; // Endereço do servidor do banco de dados
    private $usuario = "root"; // Seu usuário do banco de dados
    private $senha = ""; // Sua senha do banco de dados
    private $banco = "eventos"; // Nome do banco de dados
    private $conexao;

    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        $this->conexao->set_charset("utf8");

        if ($this->conexao->connect_error) {
            die("Erro na conexão: " . $this->conexao->connect_error);
        }
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function fecharConexao() {
        $this->conexao->close();
    }
}


?>