CREATE DATABASE IF NOT EXISTS biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biblioteca;

CREATE TABLE autores (
  id_autor INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  nacionalidade VARCHAR(80),
  ano_nascimento INT
) ENGINE=InnoDB;

CREATE TABLE livros (
  id_livro INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(200) NOT NULL,
  genero VARCHAR(80),
  ano_publicacao INT,
  id_autor INT NOT NULL,
  CONSTRAINT fk_livros_autores
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)
    ON UPDATE CASCADE
    ON DELETE RESTRICT  -- impede excluir autor com livros
) ENGINE=InnoDB;

CREATE TABLE leitores (
  id_leitor INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  email VARCHAR(120),
  telefone VARCHAR(20)
) ENGINE=InnoDB;

CREATE TABLE emprestimos (
  id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
  id_livro INT NOT NULL,
  id_leitor INT NOT NULL,
  data_emprestimo DATE NOT NULL,
  data_devolucao DATE,
  FOREIGN KEY (id_livro) REFERENCES livros(id_livro) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (id_leitor) REFERENCES leitores(id_leitor) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;
