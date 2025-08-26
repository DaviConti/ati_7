CREATE DATABASE IF NOT EXISTS biblioteca_1;
USE biblioteca_1;

CREATE TABLE autores (
    id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(50),
    ano_nascimento INT
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(50),
    ano_publicacao INT,
    id_autor INT,
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)
);

CREATE TABLE leitores (
    id_leitor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefone VARCHAR(20)
);

CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_livro INT,
    id_leitor INT,
    data_emprestimo DATE,
    data_devolucao DATE,
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id_leitor)
);

INSERT INTO autores (nome, nacionalidade, ano_nascimento) VALUES
('Machado de Assis', 'Brasileiro', 1839),
('J.K. Rowling', 'Britânica', 1965),
('George Orwell', 'Britânico', 1903),
('Clarice Lispector', 'Brasileira', 1920);

INSERT INTO livros (titulo, genero, ano_publicacao, id_autor) VALUES
('Dom Casmurro', 'Romance', 1899, 1),
('Memórias Póstumas de Brás Cubas', 'Romance', 1881, 1),
('Harry Potter e a Pedra Filosofal', 'Fantasia', 1997, 2),
('1984', 'Distopia', 1949, 3),
('A Hora da Estrela', 'Romance', 1977, 4);

INSERT INTO leitores (nome, email, telefone) VALUES
('Ana Souza', 'ana@email.com', '11987654321'),
('Carlos Silva', 'carlos@email.com', '11976543210'),
('Mariana Oliveira', 'mariana@email.com', '21965432109');

INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo, data_devolucao) VALUES
(1, 1, '2025-08-01', '2025-08-15'),
(3, 2, '2025-08-05', NULL),
(4, 3, '2025-08-10', '2025-08-20');