# 🔗 LiteLink — Encurtador de URLs

Aplicação web em Laravel para encurtar URLs com contador de visitas e histórico recente.

---

## 📋 Pré-requisitos

Antes de começar, instale:

- **PHP 8.1+** → https://www.php.net/downloads
- **Composer** → https://getcomposer.org/download/
- **Git** → https://git-scm.com/ (opcional)

> SQLite já vem embutido no PHP. Não precisa instalar MySQL.

---

## 🚀 Instalação passo a passo

### 1. Criar o projeto Laravel

Abra o terminal no VS Code (`Ctrl + '`) e execute:

```bash
composer create-project laravel/laravel litelink
cd litelink
```

### 2. Copiar os arquivos deste projeto

Substitua os arquivos originais pelos do LiteLink:

| Arquivo deste projeto | Destino no seu projeto |
|---|---|
| `app/Models/ShortUrl.php` | `app/Models/ShortUrl.php` |
| `app/Http/Controllers/UrlShortenerController.php` | `app/Http/Controllers/UrlShortenerController.php` |
| `routes/web.php` | `routes/web.php` |
| `resources/views/layouts/app.blade.php` | `resources/views/layouts/app.blade.php` (criar pasta layouts) |
| `resources/views/home.blade.php` | `resources/views/home.blade.php` |
| `database/migrations/..._create_short_urls_table.php` | `database/migrations/` |

### 3. Configurar o ambiente

```bash
# Copiar o arquivo de configuração
cp .env.example .env

# Gerar a chave da aplicação
php artisan key:generate
```

Abra o `.env` e confirme que está assim:

```
DB_CONNECTION=sqlite
```

### 4. Criar o banco de dados SQLite

```bash
# Criar o arquivo do banco (Windows)
type nul > database\database.sqlite

# Criar o arquivo do banco (Mac/Linux)
touch database/database.sqlite
```

### 5. Rodar as migrations

```bash
php artisan migrate
```

Você verá algo como:
```
  INFO  Running migrations.
  2024_01_01_000000_create_short_urls_table ................ DONE
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

Acesse: **http://localhost:8000**

---

## 📁 Estrutura dos arquivos principais

```
litelink/
├── app/
│   ├── Http/Controllers/
│   │   └── UrlShortenerController.php   ← Toda a lógica
│   └── Models/
│       └── ShortUrl.php                 ← Model Eloquent
├── database/
│   ├── migrations/
│   │   └── ..._create_short_urls_table.php
│   └── database.sqlite                  ← Banco de dados (gerado)
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php               ← Layout base
│   └── home.blade.php                  ← Página principal
├── routes/
│   └── web.php                         ← Rotas da aplicação
└── .env                                 ← Configurações
```

---

## 🌐 Como funciona

| Rota | Método | Descrição |
|---|---|---|
| `/` | GET | Página inicial com formulário e histórico |
| `/shorten` | POST | Recebe a URL, gera o código e salva |
| `/{code}` | GET | Redireciona para a URL original |

---

## 🐛 Problemas comuns

**Erro: `No application encryption key`**
```bash
php artisan key:generate
```

**Erro: `database.sqlite does not exist`**
```bash
# Windows
type nul > database\database.sqlite

# Mac/Linux
touch database/database.sqlite
```

**Erro: `Class ShortUrl not found` na view home.blade.php**

Adicione o use no topo do arquivo `home.blade.php`:
```blade
@php use App\Models\ShortUrl; @endphp
```
Ou mova a lógica para o controller (já está feito na versão do projeto).

---

## 📤 Subir para o GitHub

```bash
git init
git add .
git commit -m "feat: initial commit - LiteLink URL shortener"
git branch -M main
git remote add origin https://github.com/SEU_USUARIO/litelink.git
git push -u origin main
```
