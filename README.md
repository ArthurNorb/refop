# Projeto REFOP - Website da Associação das Repúblicas Federais de Ouro Preto

## Visão Geral do Projeto

O Website da REFOP é uma plataforma digital desenvolvida para ser o principal canal de comunicação da Associação das Repúblicas Federais de Ouro Preto com suas repúblicas associadas, estudantes e a comunidade em geral. O site apresenta um design moderno e responsivo, focado em centralizar informações, divulgar eventos e facilitar a interação.

### Funcionalidades Principais:

* **Página Inicial:** Exibição de publicações e notícias recentes.
* **Sobre:** Informações institucionais da REFOP.
* **Repúblicas:** Listagem de todas as repúblicas associadas, com páginas individuais detalhadas para cada uma.
* **Eventos:** Calendário e arquivo de eventos da associação.
* **Galeria:** Coleção de fotos de eventos e atividades.
* **Contato:** Formulário de e-mail para a ouvidoria da REFOP.
* **Painel Administrativo:** Área restrita para gerenciamento (CRUD) de publicações, repúblicas, eventos e galeria de fotos.

## Tecnologias Utilizadas

* **Backend:** Laravel (PHP Framework)
* **Frontend:** HTML, SCSS (Sass), Bootstrap, JavaScript
* **Banco de Dados:** MySQL
* **Gerenciamento de Pacotes PHP:** Composer
* **Gerenciamento de Pacotes JavaScript:** npm ou Yarn
* **Compilação de Assets:** Vite

## Requisitos do Sistema

Certifique-se de que seu ambiente de desenvolvimento atenda aos seguintes requisitos:

* PHP >= 8.1
* Composer
* Node.js >= 16.0
* npm ou Yarn
* Servidor web (Apache, Nginx ou PHP Development Server)
* MySQL ou outro banco de dados compatível com Laravel

## Como Instalar e Configurar o Projeto

Siga os passos abaixo para colocar o projeto em funcionamento em sua máquina local.

### 1. Clonar o Repositório

Primeiro, clone o repositório do GitHub para o seu ambiente local:

```bash
git clone <URL_DO_SEU_REPOSITORIO>
cd refop-website # ou o nome da pasta do seu projetoEu entendi o problema! O formato de Markdown que eu estava usando para o Bash fazia com que o bloco de código se estendesse demais.
```

## 2. Instalar Dependências PHP

```bash
composer install
```

## 3. Configurar o Arquivo de Ambiente (`.env`)

Copie o arquivo de exemplo `.env.example` para `.env` e configure as credenciais do seu banco de dados e outras variáveis de ambiente.

```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure as variáveis, preenchendo com suas informações de banco de dados:

```
APP_NAME="REFOP"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=refop_db
DB_USERNAME={usuario}
DB_PASSWORD={senha}
```

## 4. Gerar a Application Key

```bash
php artisan key:generate
```

## 5. Configurar o Banco de Dados

Crie o banco de dados conforme o nome definido em `DB_DATABASE` no seu servidor MySQL. Em seguida, execute as migrações para criar as tabelas no banco de dados.

```bash
php artisan migrate
```

## 6. Instalar Dependências Node.js

Com npm ou Yarn, instale as dependências frontend.

```bash
npm install
```

## 7. Compilar Assets Frontend

Use o Vite para compilar os arquivos SCSS e JavaScript.

```bash
npm run dev
```

Se você usar `npm run dev`, o Vite continuará observando as alterações e recompilando os assets automaticamente. Mantenha este comando rodando em um terminal separado enquanto desenvolve.

## 8. Iniciar o Servidor de Desenvolvimento

Você pode iniciar o servidor de desenvolvimento do Laravel.

```bash
php artisan serve
```

O site estará disponível em `http://localhost:8000` (ou a porta indicada).

## Estrutura de Pastas Relevantes

* `app/Models/`
* `app/Http/Controllers/`
* `routes/web.php`
* `resources/views/`
* `resources/scss/`
* `resources/js/`
* `public/`
* `database/migrations/`
