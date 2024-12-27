---

# CRUD Simples - Sistema de Cadastro de Representantes, Clientes e Produtos

Este é um projeto simples de **CRUD** (Create, Read, Update, Delete) desenvolvido em **PHP** com integração com banco de dados **MySQL** e utilizando o **XAMPP** como servidor local. O projeto permite que o usuário registre **representantes**, **clientes** e **produtos**, além de poder editar os dados de ambos os registros.

A interface foi desenvolvida utilizando **HTML** e **CSS**, proporcionando uma experiência simples e acessível ao usuário. Também implementei **máscaras** e **validações** utilizando **JavaScript** para melhorar a usabilidade e garantir dados corretos.

## Funcionalidades

- Cadastro e edição de **representantes**, **clientes** e **produtos**.
- Exibição de informações cadastradas.
- Edição e remoção de registros.
- Validações e máscaras de entrada para garantir dados corretos.

## 🚀 Como Rodar o Projeto

1. **Baixe o repositório**:
   - Baixe o arquivo do projeto e extraia-o para o seu ambiente de desenvolvimento.

2. **Configuração do Banco de Dados**:
   - Crie as tabelas no seu banco de dados MySQL e execute o arquivo `sql_dados.sql` ou use os seguintes comandos SQL para criar as tabelas e os índices:

### Códigos para criação das tabelas:

```sql
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
```

### Códigos para os índices:

```sql
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
```

3. **Execute o servidor local**:
   - Utilize o **XAMPP** para rodar o servidor local e acesse a aplicação através do **PHP**.
   - Coloque o projeto dentro da pasta `htdocs` do XAMPP e inicie o servidor Apache e MySQL.

4. **Acesse o Projeto**:
   - Após rodar o servidor, abra o navegador e acesse [http://localhost/nome_do_projeto](http://localhost/nome_do_projeto).

## 🛠 Tecnologias Utilizadas

- **PHP** (para o backend e manipulação do banco de dados)
- **MySQL** (para o banco de dados)
- **HTML** e **CSS** (para a interface do usuário)
- **JavaScript** (para validações e máscaras de entrada)
- **XAMPP** (para rodar o servidor local)

## ⚠️ Requisitos

- **XAMPP** instalado
- **PHP** (>= 7.0)
- **MySQL**
- Navegador de internet

## 📄 Licença

Este projeto é de código aberto. Fique à vontade para usar e modificar conforme necessário.

---
