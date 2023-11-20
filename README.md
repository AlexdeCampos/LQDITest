<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

</p>

## Sobre o projeto

API para coleta de leads

## Configuração

Esse projeto pode ser iniciado com o uso ou não do docker.\
Caso opte por não usar, será necessário ter instalado na máquina tanto php8.1^ quanto Mysql

É necessário também possuir o [composer](https://getcomposer.org) instalado.

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

Teste iniciado as 10:13 dia 20/11/2023
