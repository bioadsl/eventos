# Pedido inicial


Preciso de um sistema de cadastro de eventos e reserva de vagas no onibus
cada evento deve possuir a opção de vincular o uso do onibus
dependendo do numero de dias do evento o sistema deve listar as viagens cadastradas para aceite do motorista e confirmação do usuario
o sistema deve ser responsivo para ser visto no celular

o form de evento:
---
os campos do form de cadastro de evento sao 
evento,
vagas disponiveis do evento, 
data inicio, 
data final, 
numero de dias do evento, 
horario inicio, horario final, 
endereço, 
localização, 
nome contato, 
telefone contato  
no form de evento de haver a opção de vinculo com o uso do onibus 
caso positivo deve exibir a opção
Valor da passagem
numero de viagens
dia
numero de vagas do onibus
para ida
para volta

 
O form de incrição do usuario no evento e viagem:
---
o sistema deve possuir uma lista de eventos que consulte o banco de dados no form de confirmação de presença no evento, com seu respectivo dia
o form de conter uma mensagem informando o usuario que caso ele nao seja localizado na lista ele deve fazer o cadastro
o sistema deve possuir uma lista de usuario que consulte o banco de dados no form de confirmação de presença no evento, com seu respectivo dia
Caso seja feito o vinculo do uso do onibus
o form deve possuir um campo para o usuario informar de vai de onibus ou carro proprio
Caso o usuario opte por ir de onibus
o form deve exibir uma lista de viagens disponiveis no onibus que consulte o banco de dados no form de confirmação de presença no evento e na viagem, com seu respectivo dia
o form deve exibir uma lista de vagas disponiveis no onibus que consulte o banco de dados no form de confirmação de presença no evento e na viagem, com seu respectivo dia

caso o usuario nao esteja na lista ele deve ser cadastrado
os campos do form de cadastro de usuario sao nome, email e celular

O form da viagem:
--- 
o sistema deve possuir uma lista de consulta de eventos com viagens cadastradas para que o motorista faça o aceite da viagem 
o sistema deve possuir uma lista de eventos que consulte o banco de dados no form de confirmação de viajem no evento, com seu respectivo numero de dias 
o sistema deve possuir uma lista de motoristas que consulte o banco de dados no form de confirmação de presença no evento, com seu respectivo numero de dias

caso o motorista nao esteja na lista ele deve ser cadastrado
os campos do form de cadastro de motorista sao nome, email e celular

Tela inicial
---
A home do sistema deve conter 4 cards com respectivos icones
1 - Consulta de eventos vigentes em forma de cards, com o numero de usuarios confirmados, numero de vagas disponiveis do evento, botao "Novo" redirecionando para a tela de Cadastro de eventos 
2 - Cadastro de usuarios com link para o form de cadastro de usuarios
3 - Cadastro de motoristas com link para o form de cadastro de motorista
4 - Consulta de viagens com link para a tela de consulta de viagens com a ação de aceite da viagem para o motorista para cada registro




====================================================================================================================================


# Requisitos do Sistema - Sistema de Eventos e Reservas de Vagas

## Tabelas

### Eventos
- evento_id (chave primária)
- nome_evento
- vagas_disponiveis
- data_inicio
- data_final
- numero_dias
- horario_inicio
- horario_final
- endereco
- localizacao
- nome_contato
- telefone_contato

### Usuarios
- usuario_id (chave primária)
- nome
- email
- celular

### Motoristas
- motorista_id (chave primária)
- nome
- email
- celular

### Viagens
- viagem_id (chave primária)
- evento_id (chave estrangeira referenciando Eventos)
- data_viagem
- valor_passagem
- numero_viagens
- vagas_disponiveis_ida
- vagas_disponiveis_volta

### Presencas
- presenca_id (chave primária)
- usuario_id (chave estrangeira referenciando Usuarios)
- evento_id (chave estrangeira referenciando Eventos)
- vai_de_onibus (booleano para indicar se vai de ônibus ou carro)
- viagem_ida_id (chave estrangeira referenciando Viagens)
- viagem_volta_id (chave estrangeira referenciando Viagens)

## Regras de Negócio

- Um evento pode ter zero ou mais viagens associadas a ele.
- Cada viagem está associada a um evento específico.
- Os usuários podem confirmar presença em um evento, indicando se vão de ônibus ou de carro próprio.
- Se um usuário optar por ir de ônibus, ele deve selecionar uma viagem disponível no ônibus para ida e outra para volta, se aplicável.
- Os motoristas podem aceitar ou recusar viagens associadas a eventos.
- A página inicial deve exibir os seguintes elementos:
  - Lista de eventos vigentes em forma de cards.
  - Cadastro de usuários.
  - Cadastro de motoristas.
  - Consulta de viagens com a ação de aceite da viagem para o motorista.

## Frontend

- O frontend será desenvolvido utilizando Bootstrap.
- Cada funcionalidade do sistema terá páginas da web correspondentes conectadas ao backend PHP, que interage com o banco de dados MySQL.
- O frontend será responsivo para garantir acessibilidade em dispositivos móveis.
