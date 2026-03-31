# 🔗 LiteLink - Encurtador de URLs

O **LiteLink** é uma aplicação web simples e funcional que permite aos usuários transformar URLs longas em links curtos e fáceis de compartilhar. O projeto foi desenvolvido para demonstrar habilidades em PHP com o framework Laravel, manipulação de banco de dados e contagem dinâmica de acessos.

## 🚀 Funcionalidades
- **Encurtamento de links:** Gera um código aleatório exclusivo para cada URL.
- **Redirecionamento:** Redireciona o usuário do link curto para o destino original.
- **Contador de Visitas:** Rastreia quantos cliques cada link recebeu em tempo real.
- **Histórico Recente:** Exibe os últimos 5 links gerados na página inicial.
- **Validação:** Garante que apenas URLs válidas sejam processadas.

## 🛠️ Tecnologias Utilizadas
- **Framework:** [Laravel 10+](https://laravel.com/)
- **Linguagem:** PHP 8.1+
- **Banco de Dados:** SQLite (Fácil portabilidade)
- **Frontend:** HTML5, Tailwind CSS (via CDN)
- **Ferramentas:** Eloquent ORM, Migrations e Blade Engine.

## 📦 Como instalar e rodar o projeto

1. **Clonar o repositório:**
   ```bash
   git clone https://github.com/SEU_USUARIO/litelink.git
   cd litelink

   ### 3. Como subir para o GitHub (Passo a Passo no Terminal)

Se você ainda não criou o repositório no GitHub, crie um novo chamado `litelink` e depois execute estes comandos na pasta do seu projeto:

```bash
# Inicializar o git
git init

# Adicionar todos os arquivos (o .gitignore vai ignorar o que não deve subir)
git add .

# Criar o primeiro commit
git commit -m "feat: initial commit - URL shortener logic and UI"

# Conectar ao seu repositório remoto (substitua pelo seu link)
git branch -M main
git remote add origin https://github.com/SEU_USUARIO/litelink.git

# Enviar para o GitHub
git push -u origin main
