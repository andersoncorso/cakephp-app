# Aplicativo CakePHP com controle de acessos

Description....

## Instalação

### 1) Baixe o repositório

- via git clone:
```
git clone https://github.com/andersoncorso/cakephp-access_control.git
```

### 2) Instale os pacotes de dependências 

- via composer:
```
composer update
```


## Configuração

### CakePHP 3x:

1) Renomeie o arquivo `config/app.default.php` para `config/app.php`;
2) Abra o arquivo e configure o `'SECURITY_SALT'` e também o `'Datasources'` alem de qualquer outra configuração relevante.

### Plugin AclManager [AclManager](https://github.com/ivanamat/cakephp3-aclmanager):

- importe a estrutura de Banco de Dados
```
bin/cake migrations migrate -p Acl
```

- importe o arquivo de banco de dados com a estrutura de Groups, Roles and Users
```
config/schema/acl_manager.sql
```

- crie registros de 'Groups', 'Roles' e 'Users' acessando a url '...localhost/meuapp/access-manager/groups';
- acesse o plugin pela url '...localhost/meuapp/AclManager' e clique no link 'Update ACOs and AROs and set default values';
- comente ou exclua a seguinte linha no 'src/Controller/AppController.php':
```
// $this->Auth->allow();
```

## Layout


