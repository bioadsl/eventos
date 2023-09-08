<?php

class DatabaseManager
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "eventos"); // Configure as informações de conexão aqui
        $this->conn->set_charset("utf8");

        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }

    public function listarEventos()
    {
        $query = "SELECT `evento_id`, `nome_evento`, `vagas_disponiveis`, `data_inicio`, `data_final`, `numero_dias`, `horario_inicio`, `horario_final`, `endereco`, `localizacao`, `nome_contato`, `telefone_contato` FROM `eventos`";
        $result = $this->conn->query($query);
    
        $eventos = array();
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $eventos[] = $row;
            }
        }
    
        return $eventos;
    }

    public function listarUsuarios()
    {
        $query = "SELECT usuario_id, nome, email, celular FROM Usuarios";
        $result = $this->conn->query($query);

        $usuarios = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }

    public function listarViagens()
    {
        $query = "SELECT v.viagem_id, e.nome_evento, v.data_viagem, v.valor_passagem, v.numero_viagens, v.vagas_disponiveis_ida, v.vagas_disponiveis_volta, v.partida, v.volta FROM viagens as v INNER JOIN eventos as e on v.evento_id = e.evento_id";
        $result = $this->conn->query($query);

        $viagens = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $viagens[] = $row;
            }
        }

        return $viagens;
    }

    public function listarMotoristas()
    {
        $query = "SELECT motorista_id, nome FROM Motoristas";
        $result = $this->conn->query($query);

        $motoristas = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $motoristas[] = $row;
            }
        }

        return $motoristas;
    }


    public function listarVagasDisponiveis($viagemId)
    {
        $query = "SELECT evento_id, viagem_id, vagas_disponiveis_ida, vagas_disponiveis_volta FROM viagens WHERE viagem_id = ?";
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            die("Erro na preparação da consulta: " . $this->conn->error);
        }
    
        $stmt->bind_param("i", $viagemId);
        $stmt->execute();
    
        $vagasOnibus = array();
    
        $result = $stmt->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $vagasOnibus[] = $row;
            }
        } else {
            die("Erro na execução da consulta: " . $this->conn->error);
        }
    
        $stmt->close();
    
        return $vagasOnibus;
    }
    


    public function listarViagensPorEvento($eventoId)
    {
        $query = "SELECT `viagem_id`, `evento_id`, `data_viagem`, `valor_passagem`, `numero_viagens`, `vagas_disponiveis_ida`, `vagas_disponiveis_volta`, `partida`, `volta` FROM `viagens` WHERE `evento_id` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $eventoId);
        $stmt->execute();
    
        $viagens = array();
    
        $result = $stmt->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $viagens[] = $row;
            }
        }
    
        $stmt->close();
    
        return $viagens;
    }
    


    public function fecharConexao()
    {
        $this->conn->close();
    }
}

?>
