# Claviculário de Chaves - Sistema de Gerenciamento

## Sobre o Projeto
Este é um sistema de claviculário de chaves desenvolvido para gerenciar de forma eficiente as chaves para empresa Intermarítima, bem como seus respectivos setores, como Funcionários, Salas e Departamentos. O projeto foi construído utilizando *PHP, o framework **Laravel* e o banco de dados *MySQL*.

O sistema permite:
- Administração de chaves;
- Criação, edição e exclusão de setores;
- Controle de acesso às informações.

## Funcionalidades

### 1. Gerenciamento de Chaves
- Cadastro de novas chaves;
- Atualização de informações de chaves existentes;
- Exclusão de chaves obsoletas;
- Associação de chaves a salas e funcionários.

### 2. Gerenciamento de Funcionários
- Cadastro de funcionários com dados básicos (identificador, nome, cargo, departamento associado);
- Vinculação de funcionários a departamentos;
- Permissão para acesso a determinadas chaves.

### 3. Gerenciamento de Salas
- Criação de salas com identificações únicas;
- Atualização de dados de salas;
- Exclusão de salas não mais utilizadas;
- Controle das chaves atribuídas a cada sala.

### 4. Gerenciamento de Departamentos
- Cadastro de departamentos;
- Edição e exclusão de departamentos;

## Tecnologias Utilizadas

- *PHP*: Linguagem de programação para o backend;
- *Laravel*: Framework PHP para desenvolvimento ágil e seguro;
- *MySQL*: Banco de dados relacional para armazenamento das informações;
- *HTML/CSS/JavaScript*: Para a interface do usuário;
- *Blade*: Motor de templates do Laravel para renderização de views.

## Requisitos

- PHP 8.0 ou superior;
- Composer (para gerenciamento de dependências do Laravel);
- MySQL 5.7 ou superior;
- Node.js e npm (opcional, para gerenciamento de pacotes frontend).

## Configuração do Projeto

1. Clone o repositório para sua máquina local:
   bash
   git clone https://github.com/Neiva04/claviulario-intermaritma.git
   

2. Acesse a pasta do projeto:
   bash
   cd seu-repositorio
   

3. Instale as dependências do Laravel:
   bash
   composer install
   

4. Configure o arquivo .env:
   - Copie o arquivo de exemplo:
     bash
     cp .env.example .env
     
   - Configure as variáveis de ambiente, incluindo as credenciais do banco de dados.

5. Gere a chave da aplicação:
   bash
   php artisan key:generate
   

6. Execute as migrações para criar as tabelas no banco de dados:
   bash
   php artisan migrate
   

7. Inicie o servidor de desenvolvimento:
   bash
   php artisan serve
   
   O sistema estará acessível em [http://localhost:8000](http://localhost:8000).

## Estrutura do Banco de Dados

O banco de dados possui as seguintes tabelas principais:
- *chaves*: Armazena as informações das chaves;
- *funcionarios*: Dados dos funcionários cadastrados;
- *salas*: Informações sobre as salas;
- *departamentos*: Detalhes dos departamentos.

## Contribuição

Contribuições são bem-vindas! Para contribuir:
1. Realize um fork do repositório;
2. Crie uma nova branch para suas modificações:
   bash
   git checkout -b minha-nova-feature
   
3. Envie suas alterações:
   bash
   git push origin minha-nova-feature
   
4. Abra um Pull Request.
