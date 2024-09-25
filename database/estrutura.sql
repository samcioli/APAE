CREATE DATABASE apae_db;
USE apae_db;

-- Tabela para Administradores
CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Tabela para Funcionários
CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Tabela para Nutricionistas
CREATE TABLE nutricionistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    crn VARCHAR(20) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Tabela para Produtos
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    medida VARCHAR(10) NOT NULL
);

-- Tabela para Fornecedores
CREATE TABLE fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    ramo VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    whatsapp VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL
);

-- Tabela para Cotações
CREATE TABLE cotacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    id_fornecedor INT NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL,
    data_cotacao DATE NOT NULL,
    FOREIGN KEY (id_produto) REFERENCES produtos(id),
    FOREIGN KEY (id_fornecedor) REFERENCES fornecedores(id)
);

-- Tabela para Cardápios
CREATE TABLE cardapios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_prato VARCHAR(100) NOT NULL,
    ingredientes TEXT NOT NULL,
    valor_nutricional DECIMAL(10, 2) NOT NULL,
    data_criacao DATE NOT NULL
);
