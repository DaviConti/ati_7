CREATE DATABASE padaria;

USE padaria;

CREATE TABLE usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    senha_hash varchar(255) NOT NULL,
    telefone varchar(20),
    data_contraracao DATE NOT NULL
);

CREATE TABLE produto(
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    descricao text NOT NULL,
    preco decimal(10, 2) not NULL,
    quantidade_estoque INT NOT NULL,

    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE cliente(
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    telefone varchar(100),
    endereco varchar(255),
    data_contraracao DATE NOT NULL
);

CREATE TABLE pedidos(
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_produto INT NOT NULL,

    quantidade int NOT NULL,
    data_pedido DATETIME NOT NULL,
    status varchar(50) NOT NULL,

    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
    FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);

CREATE TABLE usuarios(
	pk int AUTO_INCREMENT PRIMARY KEY,
    username varchar(120) NOT null UNIQUE,
    senha varchar(255) NOT null
);

INSERT INTO usuarios (usernames, senhas) VALUES ('admin','123')