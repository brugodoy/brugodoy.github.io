-- Criação do banco de dados
CREATE DATABASE bdbd;

-- Usa o banco de dados
USE bdbd;

-- Criação da tabela de entrada
CREATE TABLE entrada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sigla VARCHAR(14),
    cnae VARCHAR(7),
    área VARCHAR(15),
    ano VARCHAR(4),
);

-- Criação da tabela de imoveis
CREATE TABLE imoveis (
    sigla VARCHAR (14) PRIMARY KEY,
    titulo VARCHAR(10),
    logradouro VARCHAR(100),
    numero INT(5),
    bairro VARCHAR(30),
    complemento VARCHAR(30),
    zona VARCHAR(12),
);

-- Criação da tabela de saida
CREATE TABLE saida (
    id INT PRIMARY KEY,
    idmask VARCHAR(10),
    sigla VARCHAR(14),
    endereco VARCHAR(7),
    área VARCHAR(15),
);

-- Atualizando o novo campo com a concatenação dos campos da Tabela2
UPDATE saida
SET idmask = CONCAT(entrada.id, '/', entrada.ano)
FROM entrada
WHERE saida.id = entrada.id;
