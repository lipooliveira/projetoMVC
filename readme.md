# Projeto MVC

Este é um projeto de exemplo utilizando o padrão de arquitetura MVC (Model-View-Controller) em PHP.

## Estrutura do Projeto

### Controllers

- **AuthController**: Gerencia a autenticação de usuários, incluindo login, registro e logout.
- **DashboardController**: Carrega a visão do dashboard.
- **ErroController**: Carrega a visão de erro.
- **MasterController**: Gerencia usuários, incluindo listagem, pesquisa, edição e exclusão.
- **UsuarioController**: Carrega a visão de configuração do usuário.

### Models

- **LogModel**: Representa o modelo de log.
- **UsuarioModel**: Representa o modelo de usuário, incluindo métodos para obter e definir atributos do usuário.

### DAO (Data Access Object)

- **Conexao**: Gerencia a conexão com o banco de dados.
- **LogDAO**: Gerencia operações de banco de dados relacionadas aos logs.
- **UsuarioDAO**: Gerencia operações de banco de dados relacionadas aos usuários.

### Views

- **ConfiguracaoView**: Visão de configuração do usuário.
- **DashboardView**: Visão do dashboard.
- **EditarView**: Visão para editar informações do usuário.
- **ErroView**: Visão de erro (404).
- **EstruturaView**: Estrutura básica da aplicação.
- **LoginView**: Visão de login.
- **LogView**: Visão de logs.
- **MasterView**: Visão de gerenciamento de usuários.
- **RegistroView**: Visão de registro de novos usuários.

## Configuração

1. Clone o repositório.
2. Configure o banco de dados utilizando o arquivo `projeto2s.sql` localizado na pasta `DAO`.
3. Configure o arquivo `.htaccess` para redirecionar todas as requisições para `index.php`.
4. Inicie o servidor PHP.

## Uso

- Acesse a aplicação através do navegador.
- Utilize as funcionalidades de autenticação para login e registro.
- Navegue pelo dashboard e gerencie usuários se tiver permissões de administrador.

## Contribuição

Sinta-se à vontade para contribuir com o projeto através de pull requests.

## Licença

Este projeto está licenciado sob a licença MIT.