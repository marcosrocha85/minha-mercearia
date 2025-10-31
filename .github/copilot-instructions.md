# Instruções para Assistente de Codificação IA - Minha Mercearia

## Visão Geral do Projeto
Este é um aplicativo Laravel 12 chamado "Minha Mercearia" (My Grocery Store) - uma instalação fresca do Laravel com estrutura básica para uma loja virtual de mercearia. O projeto usa PHP 8.2+ moderno, Vite para compilação de assets e Tailwind CSS v4 para estilização.

Sempre que eu pedir alguma coisa, você deve olhar o README.md para entender o contexto do projeto antes de responder.
O arquivo README.md vai conter outros arquivos de documentação que nós vamos colocar dentro de /docs que serão úteis para você entender o projeto.

## Comentários
- Sempre que você for gerar código, utilize inglês para nomes de classes, métodos, variáveis e comentários no código, a menos que eu peça explicitamente para usar português.
- Sempre que você for gerar comentários para o código, utilize comentários descritivos e claros em português do Brasil.

## Arquitetura e Stack Tecnológico
- **Backend**: Framework Laravel 12 com PHP 8.2+
- **Frontend**: Vite + Tailwind CSS v4 + Axios para requisições HTTP
- **Banco de Dados**: Migrações padrão do Laravel (SQLite para testes, configurável para produção)
- **Testes**: PHPUnit com suítes de testes Feature e Unit
- **Desenvolvimento**: Laravel Sail para ambiente de desenvolvimento containerizado

## Diretórios e Arquivos Principais
- `app/Models/` - Modelos Eloquent (User.php implementado, Product.php existe mas vazio)
- `database/migrations/` - Definições de esquema do banco de dados
- `resources/views/` - Templates Blade
- `resources/js/` - JavaScript frontend (configuração Axios em bootstrap.js)
- `resources/css/` - Tailwind CSS com configuração de tema customizado
- `routes/web.php` - Rotas web (atualmente apenas página de boas-vindas)
- `tests/` - Testes PHPUnit (estrutura Feature/Unit)

## Fluxo de Desenvolvimento
### Configuração e Desenvolvimento Local
```bash
composer run setup  # Instalar deps, copiar .env, gerar chave, migrar, compilar assets
composer run dev    # Iniciar servidores dev concorrentes (Laravel + Vite + Queue + Logs)
npm run dev         # Alternativa: executar apenas servidor dev Vite
```

### Testes
```bash
composer run test   # Executar testes com limpeza de cache de config
php artisan test    # Execução direta PHPUnit
```

### Banco de Dados
```bash
php artisan migrate         # Executar migrações
php artisan migrate:fresh   # Resetar banco de dados
php artisan db:seed         # Popular banco de dados
```

## Padrões e Convenções de Codificação

### Modelos
- Use Eloquent com type hints e PHPDoc adequados
- Siga proteção de atribuição em massa do Laravel (`$fillable`, `$hidden`)
- Use casts para tipos de dados adequados (veja exemplo User.php)
- Implemente relacionamentos e scopes conforme necessário

### Controladores
- Estenda classe base `Controller` de `app/Http/Controllers/Controller.php`
- Use injeção de dependência do Laravel
- Retorne respostas HTTP adequadas ou views

### Integração Frontend
- Assets compilados via Vite (diretiva `@vite` em templates Blade)
- Axios configurado globalmente em `resources/js/bootstrap.js`
- Use classes utilitárias Tailwind (tema customizado em `resources/css/app.css`)

### Migrações de Banco de Dados
- Use schema builder do Laravel
- Inclua constraints de chaves estrangeiras adequadas
- Adicione índices para performance
- Use nomes de tabela/coluna significativos

### Testes
- Testes Feature para endpoints HTTP e ciclos completos de requisição/resposta
- Testes Unit para lógica de negócio isolada
- Use helpers de teste do Laravel (`$this->get()`, `assertStatus()`, etc.)
- Banco usa SQLite em memória para execução rápida de testes

## Estado Atual
- Instalação básica Laravel 12 com scaffolding de autenticação
- Modelo User totalmente implementado com factories e seeders
- Modelo Product existe mas precisa implementação (relacionamentos, campos fillable, etc.)
- Página de boas-vindas com design Tailwind moderno
- Nenhuma lógica de negócio customizada implementada ainda
- Pronto para desenvolvimento de funcionalidades e-commerce

## Tarefas Comuns
1. **Adicionar Funcionalidades de Produto**: Implementar relacionamentos do modelo Product, controladores e views
2. **Autenticação de Usuário**: Estender Laravel Breeze/Jetstream ou construir auth customizado
3. **Carrinho de Compras**: Implementar funcionalidade de carrinho com sessions ou armazenamento em banco
4. **Painel Admin**: Criar interfaces CRUD para gerenciamento de produto/categoria
5. **Desenvolvimento de API**: Construir APIs RESTful para integração com app mobile

## Padrões Específicos do Laravel
- Use comandos `php artisan make:*` para scaffolding (model, controller, migration, etc.)
- Siga autoloading PSR-4 com namespace `App\`
- Use container de serviços do Laravel para injeção de dependência
- Implemente middleware para autenticação e autorização
- Use relacionamentos Eloquent (belongsTo, hasMany, etc.) para modelagem de dados

## Considerações de Performance
- Use eager loading (`with()`) para prevenir queries N+1
- Implemente cache para dados acessados frequentemente
- Use índices de banco de dados em chaves estrangeiras e colunas consultadas frequentemente
- Otimize compilação de assets com code splitting do Vite

## Notas de Deploy
- Variáveis de ambiente configuradas via arquivos `.env`
- Use `php artisan config:cache` e `php artisan route:cache` em produção
- Assets estáticos servidos de `public/build/` após compilação Vite
- Migrações de banco executadas automaticamente durante deploy