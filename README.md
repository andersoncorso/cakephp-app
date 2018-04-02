# Projeto CakePHP com controle de acessos

Projeto CakePHP pronto para iniciar qualquer aplicação que necessite de Login e Controle de Acessos com ACL.


## Instalação

- Baixe o repositório:

```
composer create-project --prefer-dist andersoncorso/cakephp-app your_app_name
```

- Abra o arquivo 'config/app.php' e configure o `'Datasources'` alem de qualquer outra configuração relevante.

- Atualize as dependencias:
```
composer update
```


## Configuração:

- Plugin [AclManager](https://github.com/ivanamat/cakephp3-aclmanager):
```
bin/cake migrations migrate -p Acl
```

- Plugin [AccessManager](https://github.com/andersoncorso/cakephp-plugin-access_manager):
```
bin/cake migrations migrate -p AccessManager
```

- crie registros de 'Groups', 'Roles' e 'Users' acessando:
* '.../access-manager/groups';
* '.../access-manager/roles';
* '.../access-manager/users';

- acesse a url '.../AclManager' e clique no link 'Update ACOs and AROs and set default values';

- comente ou exclua a seguinte linha no 'src/Controller/AppController.php':
```
// $this->Auth->allow();
```


### Plugin [Places](https://github.com/andersoncorso/cakephp-plugin_places):

- importe o arquivo de banco de dados com a estrutura e dados de Regiões, Estados e Municípios
```
vendor/andersoncorso/cakephp-plugin_places/config/schema/cakephp_plugin-places.sql
```


## Layout

* Favicon
- Acesse o site [Favicon Generator](https://www.favicon-generator.org/), crie seu favicon e cole dentros do diretório:
```
webroot/img/favicon/
```


* Ps: Tema [AdminLTE](https://github.com/maiconpinto/cakephp-adminlte-theme);
- Por padrão o App utiliza o tema AdminLTE, visite a página oficial para mais detalhes. 