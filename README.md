# 🔗 LiteLink - Encurtador de URLs

O **LiteLink** é uma aplicação web simples e funcional que permite aos usuários transformar URLs longas em links curtos e fáceis de compartilhar. O projeto foi desenvolvido para demonstrar habilidades em PHP com o framework Laravel, manipulação de banco de dados e contagem dinâmica de acessos.

---

## 🚀 Funcionalidades

- **Encurtamento de links:** Gera um código aleatório exclusivo para cada URL.
- **Redirecionamento:** Redireciona o usuário do link curto para o destino original.
- **Contador de Visitas:** Rastreia quantos cliques cada link recebeu em tempo real.
- **Histórico Recente:** Exibe os últimos 5 links gerados na página inicial.
- **Validação:** Garante que apenas URLs válidas sejam processadas.

---

## 🛠️ Tecnologias Utilizadas

- **Framework:** [Laravel 10+](https://laravel.com/)
- **Linguagem:** PHP 8.1+
- **Banco de Dados:** SQLite (Fácil portabilidade)
- **Frontend:** HTML5, Tailwind CSS (via CDN)
- **Ferramentas:** Eloquent ORM, Migrations e Blade Engine

---

## 📦 Como instalar e rodar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/Abnerrum/LiteLink---Encurtador-de-URLs.git
cd LiteLink---Encurtador-de-URLs
```

### 2. Instalar as dependências

```bash
composer install
```

### 3. Configurar o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Criar o banco de dados

```bash
# Windows
type nul > database\database.sqlite

# Mac/Linux
touch database/database.sqlite
```

### 5. Rodar as migrations

```bash
php artisan migrate
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

Acesse: **http://localhost:8000**

---

## 📤 Como subir para o GitHub

```bash
git init
git add .
git commit -m "feat: initial commit - URL shortener logic and UI"
git branch -M main
git remote add origin https://github.com/Abnerrum/LiteLink---Encurtador-de-URLs.git
git push -u origin main
```
