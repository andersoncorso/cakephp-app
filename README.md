# CakePHP App

[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/andersoncorso/app)

Projeto [CakePHP](https://cakephp.org) com sistema de login e controle de acessos ACL, pronto para iniciar o desenvolvimento de uma nova aplicação.


## Instalação

1. Baixe o repositório:
```
composer create-project --prefer-dist andersoncorso/cakephp-app your_app_name
```

Caso necessite, use o comando para iniciar o servidor embutido do CakePHP:

```bash
bin/cake server -p 8765
```

Após isso ele deve estar disponível em: `http://localhost:8765`.


## Configuração

1. Edite o arquivo `config/app.php` e configure o `'Datasources'` e qualquer outra configuração relevante para sua aplicação.


## Layout

* Por padrão o App utiliza o tema [AdminLTE](https://github.com/maiconpinto/cakephp-adminlte-theme), visite a página oficial para mais detalhes.

* Favicon:

1. Acesse o site [Favicon Generator](https://www.favicon-generator.org/), crie seu favicon e cole dentros do diretório:
```
webroot/img/favicon/
```