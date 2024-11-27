-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Tempo de geração: 30/09/2024 às 01:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Banco de dados: `apae_db`

-- --------------------------------------------------------

-- Estrutura para tabela `administradores`
CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    role ENUM('admin', 'funcionario', 'nutricionista') NOT NULL
);

-- --------------------------------------------------------

-- Estrutura para tabela `cardapios`
CREATE TABLE `cardapios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prato` varchar(100) NOT NULL,
  `ingredientes` text NOT NULL,
  `valor_nutricional` decimal(10,2) NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Estrutura para tabela `cotacoes`
CREATE TABLE `cotacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(255) NOT NULL,            
  `nome_fornecedor` varchar(255) NOT NULL,          
  `preco_unitario` decimal(10,2) NOT NULL,          
  `quantidade` int(11) NOT NULL,           
  `data_cotacao` date NOT NULL,                     
  `categoria` enum('Ceasa', 'Frutas', 'Verduras', 'Higiene Pessoal', 'Açougue', 'Alimentícios', 'Limpeza', 'Descartáveis', 'Frios', 'Outros') NOT NULL, -- Categoria
  `unidade` enum('CX', 'UN', 'KG', 'MC', 'SC', 'BDJ', 'CBÇ') NOT NULL,
  `id_produto` int(11) NOT NULL,                  
  `id_fornecedor` int(11) NOT NULL,                   
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`),
  KEY `id_fornecedor` (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Estrutura para tabela `fornecedores`
CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `ramo` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Estrutura para tabela `funcionarios`
CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Estrutura para tabela `nutricionistas`
CREATE TABLE `nutricionistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `crn` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `crn` (`crn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Estrutura para tabela `produtos`
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `medida` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `relatorios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descricao` TEXT NOT NULL,
  `data_emissao` DATE NOT NULL,
  `arquivo` VARCHAR(255) NOT NULL,  -- Para armazenar o caminho do arquivo
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Não é necessário usar `ALTER TABLE` para adicionar `AUTO_INCREMENT`, pois já foi definido na criação das tabelas.

-- Comandos de ALTER TABLE para auto incremento (remover se já estiver incluído acima)
-- Já definimos AUTO_INCREMENT nas criações das tabelas, então não é necessário usar o ALTER TABLE para isso

-- Finalizando a transação
COMMIT;
