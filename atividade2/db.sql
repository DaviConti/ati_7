CREATE DATABASE IF NOT EXISTS petshop_db;
USE petshop_db;

CREATE TABLE Cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(100)
);

INSERT INTO Cliente (nome, cpf, telefone, email) VALUES
('Ana Silva', '123.456.789-00', '11999990000', 'ana@email.com'),
('Carlos Souza', '987.654.321-00', '11988880000', 'carlos@email.com'),
('Mariana Lima', '111.222.333-44', '11977770000', 'mariana@email.com');

CREATE TABLE Pet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    especie ENUM('Cachorro','Gato','Outro') NOT NULL,
    porte ENUM('Pequeno','Médio','Grande') NOT NULL,
    nascimento DATE,
    FOREIGN KEY (cliente_id) REFERENCES Cliente(id)
);

INSERT INTO Pet (cliente_id, nome, especie, porte, nascimento) VALUES
(1, 'Rex', 'Cachorro', 'Grande', '2019-05-10'),
(1, 'Mia', 'Gato', 'Pequeno', '2021-03-15'),
(2, 'Bob', 'Cachorro', 'Médio', '2020-08-22');

CREATE TABLE Servico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL UNIQUE,
    preco DECIMAL(10,2) NOT NULL CHECK (preco >= 0),
    duracao_min INT NOT NULL CHECK (duracao_min > 0)
);

INSERT INTO Servico (nome, preco, duracao_min) VALUES
('Banho', 50.00, 30),
('Tosa', 80.00, 45),
('Vacina', 120.00, 15);

CREATE TABLE Agendamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    servico_id INT NOT NULL,
    data_hora DATETIME NOT NULL,
    status ENUM('agendado','concluido','cancelado') NOT NULL,
    observacoes TEXT,
    FOREIGN KEY (pet_id) REFERENCES Pet(id),
    FOREIGN KEY (servico_id) REFERENCES Servico(id),
    INDEX(data_hora)
);

INSERT INTO Agendamento (pet_id, servico_id, data_hora, status, observacoes) VALUES
(1, 1, '2025-09-05 10:00:00', 'agendado', 'Banho completo'),
(2, 2, '2025-09-06 14:30:00', 'agendado', 'Tosa padrão'),
(3, 3, '2025-09-07 09:00:00', 'agendado', 'Vacina antirrábica');