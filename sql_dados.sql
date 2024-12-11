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

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(250) NOT NULL,
  `categoria` varchar(11) NOT NULL,
  `n_interno` int(20) NOT NULL,
  `val_d_custo` int(100) NOT NULL,
  `val_d_venda` int(100) NOT NULL,
  `und_estoque` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `suporte` (
  `id` int(11) NOT NULL,
  `representante` varchar(150) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `cpf_cnpj_cliente` varchar(14) NOT NULL,
  `problema` varchar(1000) NOT NULL,
  `area` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_cpf_cnpj` (`cpf_cnpj`); 

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`produto`) USING BTREE;

ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tabela_cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_cpf_cnpj` (`cpf_cnpj_cliente`) USING BTREE;

ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `suporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `tabela_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
