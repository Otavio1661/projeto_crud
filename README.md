# Projeto CRUD Simples
Este é um projeto simples de CRUD (Create, Read, Update, Delete) onde explorei conceitos básicos de PHP, integração com banco de dados MySQL e o uso do XAMPP como servidor local. O objetivo principal foi colocar em prática meus conhecimentos adquiridos em PHP, MySQL e manipulação de bancos de dados.

A interface foi desenvolvida com HTML e CSS, garantindo uma experiência de usuário simples e acessível. Além disso, implementei algumas máscaras e validações utilizando JavaScript para aprimorar a usabilidade do sistema.

# Como Visualizar o Projeto
Para visualizar o projeto em sua máquina local, siga os passos abaixo:

1 - Baixe o arquivo do projeto e extraia-o para o seu ambiente de desenvolvimento.

2 - Crie as tabelas no seu banco de dados MySQL, e execute o arquivo 'sql_dados' em seu banco de dados, ou utilize os comandos SQL a seguir:

Copie e cole no seu banco de dados!

# Códigos para ciarção das tabelas #
CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(115) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `genero` varchar(14) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua_av` varchar(50) NOT NULL,
  `nu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


#  #
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(250) NOT NULL,
  `categoria` varchar(11) NOT NULL,
  `n_interno` int(20) NOT NULL,
  `val_d_custo` int(100) NOT NULL,
  `val_d_venda` int(100) NOT NULL,
  `und_estoque` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


#  #
CREATE TABLE `suporte` (
  `id` int(11) NOT NULL,
  `representante` varchar(150) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `cpf_cnpj_cliente` varchar(14) NOT NULL,
  `problema` varchar(1000) NOT NULL,
  `area` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


#  #
CREATE TABLE `tabela_cliente` (
  `id` int(11) NOT NULL,
  `representante` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `email` varchar(115) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf_cnpj_cliente` varchar(15) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua_av` varchar(50) NOT NULL,
  `nu` varchar(50) NOT NULL,
  `genero` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

# Códigos para os índices #
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_cpf_cnpj` (`cpf_cnpj`); 

#  #
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`produto`) USING BTREE;

#  #
ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id`);

#  #
ALTER TABLE `tabela_cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_cpf_cnpj` (`cpf_cnpj_cliente`) USING BTREE;

#  #
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

#  #
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

#  #
ALTER TABLE `suporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

#  #
ALTER TABLE `tabela_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
