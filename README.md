<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

</p>

## Sobre o projeto

API para coleta de leads

## Configuração

Esse projeto pode ser iniciado com o uso ou não do docker.\
Caso opte por não usar, será necessário ter instalado na máquina tanto php8.1^ quanto Mysql

É necessário possuir o [composer](https://getcomposer.org) e [node](https://nodejs.org/en) instalado.

Para a primeira configuração é necessário rodar os seguintes comandos no terminal:

`cp .env.example .env` para copiar o arquivo de configurações de variáveis de ambiente .

Caso não use o docker, altere as variáveis de conexão do banco de dados para seu ambiente.local.

`composer install` para fazer a instalação das dependências do projeto.

Com docker: \
`docker compose up -d(opcional para liberar o terminal)` esse comando vai iniciar o projeto\
`docker exec laravel php artisan migrate` esse comando irá criar a tabela de empresas\
`docker exec laravel php artisan key:generate` esse comando vai gerar uma chave de criptografia para o projeto

Sem docker: \
`php artisan serve` esse comando vai iniciar o projeto\
`php artisan migrate` esse comando irá criar a tabela de empresas\
`php artisan key:generate` esse comando vai gerar uma chave de criptografia para o projeto

Front-end:\
`npm install` para instalar todas as devendências do front end
`npm run dev` para gerar um build do projeto para que possa ser executado

Rotas:\
[POST - Register](http://127.0.0.1:8000/api/register) Cria um usuário para autenticação no projeto
[POST - Login](http://127.0.0.1:8000/api/login) Autentica um usuário
[POST - Logout](http://127.0.0.1:8000/api/logout) Remove a autenticação do usuário logado

[POST - leads](http://127.0.0.1:8000/api/leads) Insere um novo registro na tabela de leads\
[POST - leads/:id](http://127.0.0.1:8000/api/leads/1) Envia um email de contato para o id informado\
[GET - leads](http://127.0.0.1:8000/api/leads) Retorna todos os leads cadastrados

Email:\
A integração com o serviço de email foi criada, porém não foi configurada na plataforma a entrega do mesmo.\
Para veriicar os emails enviados os dados de acessão são esses:

```
https://mailtrap.io
email: alexcampos.dev@gmail.com
senha: 111015x9
```

Acesse 'Email Testing > Inboxes'

Teste iniciado as 10:13 dia 20/11/2023
