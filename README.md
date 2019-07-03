# CakePHP App

[![Total Downloads](https://img.shields.io/packagist/dt/andersoncorso/cakephp-app.svg?style=flat-square)](https://packagist.org/packages/andersoncorso/cakephp-app)

Projeto [CakePHP](https://cakephp.org) com sistema de login e controle de acessos ACL, pronto para iniciar o desenvolvimento de um novo projeto.


## Instalação

1. Via composer:
```
composer create-project --prefer-dist andersoncorso/cakephp-app your_app_name
```

OU

2. Git clone/download:
- Após extrair ou clonar o repositório, instale as dependências do projeto via composer.
```
composer install
```

Caso necessite, use o comando para iniciar o servidor embutido do CakePHP:

```bash
bin/cake server -p 8765
```

Após isso ele deve estar disponível em: `http://localhost:8765`.


## Configuração

1. Edite o arquivo `config/app.php` e configure o `'Datasources'` e qualquer outra configuração relevante para sua aplicação;

2. Plugin [AccessManager](https://github.com/andersoncorso/cakephp-plugin-access_manager):

- Crie a estrutura de tabelas para Grupos, Funções e Usuários:
```
bin/cake migrations migrate -p AccessManager
```
- (opcional) Conteúdo inicial com Grupos e Funções pre-definidos:
Groups: Webmasters, Administradores, Usuários;
Roles: Webmaster, Administrador, Gestor geral, Usuário;
Users: webmaster@app.com
```
bin/cake migrations seed -p AccessManager
```

3. Plugin [AclManager](https://github.com/ivanamat/cakephp3-aclmanager):

- Crie a estrutura de tabelas para Acl:
```
bin/cake migrations migrate -p Acl
```
- Comente ou exclua a seguinte linha no arquivo 'src/Controller/AppController.php':
```
// $this->Auth->allow();
```
- Faça o login com usuário "webmaster@app.com" e senha "123123";
- Atualize as tabelas de Acl(acos, aros, aros_acos) acessando '.../AclManager' e clique no link 'Update ACOs and AROs and set default values';

Pronto! Seja feliz ;)


## Layout

* Por padrão o App utiliza o tema [AdminLTE](https://github.com/maiconpinto/cakephp-adminlte-theme), visite a página oficial para mais detalhes.

* Favicon:

1. Acesse o site [Favicon Generator](https://www.favicon-generator.org/), crie seu favicon e cole dentros do diretório:
```
webroot/img/favicon/
```