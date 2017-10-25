# Aplicativo CakePHP com controle de acessos

Aplicativo CakePHP pronto para iniciar qualquer aplicação que necessite de Login e Controle de Acessos com ACL.

## Instalação

### 1) Baixe o repositório

```
composer create-project --prefer-dist cakephp/app your_app_name
```


## Configuração

### 1) CakePHP 3x:

- Abra o arquivo 'config/app.php' e configure o `'Datasources'` alem de qualquer outra configuração relevante.

### 2) Plugin [AclManager](https://github.com/ivanamat/cakephp3-aclmanager):

- importe a estrutura de Banco de Dados
```
bin/cake migrations migrate -p Acl
```

### 3) Plugin [AccessManager](https://github.com/andersoncorso/cakephp-plugin-access_manager):

- importe a estrutura de Banco de Dados
```
bin/cake migrations migrate -p AccessManager
```

- crie registros de 'Groups', 'Roles' e 'Users' acessando a url '...localhost/meuapp/access-manager/groups', 'roles' e 'users';
- acesse o plugin pela url '...localhost/meuapp/AclManager' e clique no link 'Update ACOs and AROs and set default values';
- comente ou exclua a seguinte linha no 'src/Controller/AppController.php':
```
// $this->Auth->allow();
```

### 4) Plugin [Places](https://github.com/andersoncorso/cakephp-plugin_places):

- importe o arquivo de banco de dados com a estrutura e dados de Regiões, Estados e Municípios
```
vendor/andersoncorso/cakephp-plugin_places/config/schema/cakephp_plugin-places.sql
```


## Layout

### 1) Favicon
- Acesse o site [Favicon Generator](https://www.favicon-generator.org/), crie seu favicon e cole dentros do diretório:
```
webroot/img/favicon/
```

### Ps: Tema [AdminLTE](https://github.com/maiconpinto/cakephp-adminlte-theme);
- Por padrão o App utiliza o tema AdminLTE, visite a página oficial para mais detalhes. 