# Aplicativo CakePHP com controle de acessos

Projeto CakePHP pronto para iniciar qualquer aplicação que necessite de Login e Controle de Acessos com ACL.

## Instalação

### 1) Baixe o repositório

- via git clone:
```
git clone https://github.com/andersoncorso/cakephp-app.git
```

### 2) Instale os pacotes de dependências 

- via composer:
```
composer update
```


## Configuração

### CakePHP 3x:

- Renomeie o arquivo `config/app.default.php` para `config/app.php`;
- Execute o comando abaixo no console para gerar o 'SECURITY_SALT' automático:
```
bin/cake salt
```
- Abra o arquivo e configure o `'Datasources'` alem de qualquer outra configuração relevante.

### Plugin [AclManager](https://github.com/ivanamat/cakephp3-aclmanager):

- importe a estrutura de Banco de Dados
```
bin/cake migrations migrate -p Acl
```

### Plugin [AccessManager](https://github.com/andersoncorso/cakephp-plugin-access_manager):

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

### Plugin [Places](https://github.com/andersoncorso/cakephp-plugin_places):

- importe o arquivo de banco de dados com a estrutura e dados de Regiões, Estados e Municípios
```
vendor/andersoncorso/cakephp-plugin_places/config/schema/cakephp_plugin-places.sql
```


## Layout

### Tema [AdminLTE](https://github.com/maiconpinto/cakephp-adminlte-theme);
- Por padrão o App utiliza o tema AdminLTE, visite a página oficial para mais detalhes. 

### Favicon
- Acesse o site [Favicon Generator](https://www.favicon-generator.org/), crie seu favicon e cole dentros do diretório:
```
webroot/img/favicon/
```