# REFOP Site

**Associação das Repúblicas Federais de Ouro Preto (REFOP)**

Aplicação institucional moderna para gerenciamento e divulgação das atividades da REFOP.

---

## Visão Geral

Este projeto é a plataforma oficial da REFOP — entidade sem fins lucrativos que representa as moradias estudantis federais da UFOP desde 2007. Aqui, você encontra:

- Publicação de **artigos**, **notícias**, **comunicados** e **notas oficiais**
- Divulgação de **eventos** e **ações solidárias**
- Apresentação das **repúblicas** e sua **estrutura de governança**
- Conteúdo explicativo sobre o funcionamento da **UFOP** e da **REFOP**

## Tecnologias Empregadas

- **Backend:** Laravel 10.x, PHP 8.x, MySQL
- **Autenticação & UI:** Jetstream, Livewire, Alpine.js
- **Front-end:** Tailwind CSS, Vite, Blade Components
- **DevOps & Build:** Composer, NPM/Yarn, Git

## Pré-requisitos

- PHP ≥ 8.1
- Composer
- Node.js ≥ 16.x
- NPM ou Yarn
- Git CLI
- Servidor web (Apache/Nginx) com suporte a PHP

## Instalação e Setup

1. Clone o repositório:
   ```bash
   git clone <URL_DO_REPOSITORIO> refop-site
   cd refop-site
    ```

2. Configure variáveis de ambiente:

   * Duplique `.env.example` para `.env`
   * Ajuste `APP_URL`, `DB_*` e credenciais de e-mail

3. Instale dependências backend:

   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. Instale dependências front-end e gere assets:

   ```bash
   npm ci
   npm run build
   ```

5. Gere caches de produção:

   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Banco de Dados

1. Crie o banco:

   ```sql
   CREATE DATABASE refop;
   ```
2. Execute as migrations:

   ```bash
   php artisan migrate --force
   ```

## Deploy & Distribuição

* **Pacote ZIP (NTI)**:

  ```bash
  zip -r REFOP-site.zip . -x ".git/*" ".env" "node_modules/*" "storage/logs/*"
  ```

  \-- ou --

  ```bash
  git archive --format=zip --output=REFOP-release.zip HEAD
  ```

* **Tarball**:

  ```bash
  tar -czvf REFOP-site.tar.gz --exclude='.git' --exclude='.env' .
  ```

## Variáveis de Ambiente Mínimas

```ini
APP_NAME=REFOP
APP_ENV=production
APP_URL=https://refop.ufop.br
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=refop
DB_USERNAME=usuario
DB_PASSWORD=senha
MAIL_MAILER=smtp
MAIL_HOST=smtp.ufop.br
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_ENCRYPTION=tls
```

## Health-Checks e Monitoramento

* Verificar endpoint `/health` para status 200
* Logs em `storage/logs/laravel.log`
* Monitorar uso de CPU/Memory no servidor

## Contato & Suporte

Para dúvidas, deploy ou suporte técnico, contate:

* **Arthur** – \[email protected]
* **NTI UFOP** – [nti@ufop.br](mailto:nti@ufop.br)

---

*Entregue com robustez, compliance e governança, pronto para produção.*