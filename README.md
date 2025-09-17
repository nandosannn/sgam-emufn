# 🎶 Sistema Gerenciador de Apresentações Musicais

#### ⚠️ **Status do Projeto:** Em progresso 🚧
Este projeto ainda está em desenvolvimento e novas funcionalidades serão adicionadas em breve.

## 📌 Sobre o Projeto

O Sistema de Gerenciamento de Apresentações Musicais é uma aplicação desenvolvida em Laravel para auxiliar no controle e organização de grupos musicais, apresentações, solicitações de transporte, cargos em eventos e gestão de usuários.

O sistema foi projetado para atender tanto a grupos musicais quanto a organizadores de eventos, permitindo gerenciar desde os integrantes e instrumentos até a logística de transporte e os eventos em si.

## 🎯 Objetivo

O objetivo principal do projeto é oferecer uma plataforma que facilite:

- O **cadastro e gerenciamento** de grupos musicais e seus integrantes.

- O **controle de apresentações**, incluindo local, data e responsáveis.

- A **organização de eventos** com designação de cargos e funções.

- O **gerenciamento logístico**, como veículos, motoristas e solicitações de transporte.

- A **gestão de usuários**, alunos e funcionários envolvidos.

## 🏗️ Estrutura do Projeto

O sistema foi modelado a partir de um DER (Diagrama Entidade-Relacionamento) que contempla as seguintes principais entidades:

- **Pessoa / Usuário / Aluno / Funcionário** – gestão de usuários e perfis.

- **Grupo Musical** – cadastro de grupos, especialidades, coordenadores e membros.

- **Instrumento Musical** – controle de instrumentos associados a membros.

- **Evento** – cadastro de eventos, descrição, data e responsáveis.

- **Solicitação de Apresentação** – pedidos de apresentações vinculados a eventos e grupos.

- **Solicitação de Transporte** – controle de veículos, motoristas e rotas.

- **Endereço e Contato** – informações complementares de pessoas e locais.

A arquitetura segue o padrão **MVC (Model-View-Controller)** do Laravel, com organização em:

- **Models** – representam as entidades do banco de dados.

- **Controllers** – lógica de negócios e comunicação entre modelos e views.

- **Migrations** – definição da estrutura do banco de dados.

- **Views (Blade)** – interfaces para interação do usuário.

## ⚙️ Instalação e Configuração

### 🔹 Pré-requisitos

Antes de começar, verifique se possui os seguintes itens instalados:

- **PHP** igual ou superior à versão 8.1

- **Composer**

- **PostegreSQL** ou outro banco compatível

- **Node.js & NPM**

### 🔹 Passo a passo

#### 1. Instale as dependências do PHP

```
composer install

npm install && npm run build
```

#### 2. Crie o arquivo de configuração

```
cp .env.example .env
```
#### 3. Configure o `.env`

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

```
#### 4. Gere a chave da aplicação

```
php artisan key:generate
```
#### 5. Execute as migrations

```
php artisan migrate --seed
```
#### 6. Inicie o servidor
```
php artisan serve
```

## 📂 Estrutura de Diretórios (principal)

```
app/                -> Models, Controllers e regras de negócio
bootstrap/          -> Arquivos de inicialização do framework
config/             -> Arquivos de configuração
database/           -> Migrations, Seeders e Factories
public/             -> Arquivos públicos (index.php, assets)
resources/          -> Views (Blade), CSS, JS
routes/             -> Definições de rotas
storage/            -> Arquivos gerados pela aplicação
tests/              -> Testes automatizados

```

## 🚀 Tecnologias Utilizadas

- **Laravel 12** (PHP Framework)

- **Postegre 17** (Banco de Dados Relacional)

- **Blade** (Template Engine do Laravel)

- **Bootstrap e AdminLTE** (Front-end)

- **Node.js & NPM** (Build de assets)

## Autor

[Fernando Santos](https://github.com/nandosannn)






