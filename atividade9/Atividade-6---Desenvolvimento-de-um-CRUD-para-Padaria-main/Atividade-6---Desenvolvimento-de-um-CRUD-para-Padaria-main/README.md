// Pré-requistos

- Computador

- Navegador compativel como Edge(não temos certeza de funcionamento em outros)

- Coneção de Xamp com php


// Banco de dados primeiro que tem que ser enviado pelo MySql ou phpMyadmin

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

// Sobre o projeto

E um site de uma padaria com o nome de Bumba meu pão, que tem como funcionalidades entrar e tirar produtos 
no lado do usuario e na parte do cliente conseguir fazer compras e pedidos

// Config/passos 

Antes de começar a rodar o sistema inteiro tem que no banco de dados, inserir um usuario e um cliente inicial

- para o usuario

seu id tem que ser 1 
seu nome, email e senha pode ser editado do jeito que preferir
telefone não precissa implementar, e a data de contratação pode
 ser qualquer data mas tem que ser colocada manualmente

- para o Cliente

seu id tem que ser 1
seu nome e email pode ser editado do jeito que preferir
seu telefone e endereço não precissa ser preenchido
e sua data de contratação tem que ser colocada manualmente


depois disso e so testar o projeto.

Obrigado!!!