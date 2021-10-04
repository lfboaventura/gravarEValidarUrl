
## Crud Url e validação status

### Sobre

Aplicação desenvolvida para geração de crud de url e validação do seu status a partir de um comando schedule, possui també, cadastro de usuário para efetuar login.

Projeto utiliza duas aplicações:

vuejs.org/);
1. Backend\FrontEnd em [PHP](https://www.php.net/manual/pt_BR/index.php) localizada na pasta **credPago**, sendo necessário ter instalados [Composer](https://getcomposer.org/) e framework [Laravel](https://laravel.com/docs/7.x/readme).

**Tecnologias, Dependências e Versões:**
* [Laravel 8.0](https://laravel.com/docs/8.x/readme).

Projeto segue [licença MIT](https://opensource.org/licenses/MIT) em disponibilização pública.


### Instalação e utilização

**1. Instalação**


_Na pasta "credPago":_

* Instalar dependências:
> composer install

* Arquivo .env e parametrizar para conexão com o [banco de dados](https://www.oracle.com/br/database/what-is-database/#:~:text=Um%20banco%20de%20dados%20%C3%A9,banco%20de%20dados%20(DBMS).)
> php -r \"file_exists('.env') || copy('.env.example', '.env');\"

* Rodar comando [artisan](https://laravel.com/docs/7.x/artisan#introduction)para geração de uma nova key.
> php artisan key:generate --ansi

* Rodar [migrations](https://laravel.com/docs/7.x/migrations#introduction) e criação de tabelas no banco de dados.
> php artisan migrate

* Rodar o server.
> php artisan serve

* Acessar
> http://localhost:8080


### Melhorias
* melhorias de fluxos das telas e o design;


**Status:** Finalizado.