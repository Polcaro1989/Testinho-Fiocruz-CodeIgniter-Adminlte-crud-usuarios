# Sistema CodeIgniter com container Docker.  

Créditos ao testinho:  
<br><br>
Abraão Polcaro.
  
  
O servidor está configurado com muitos complementos, sendo grande parte deles necessários para o pleno funcionamento.  
Obs: Esse projeto é bom para personalizar outros projetos web também. 
  
<img src="https://github.com/abraao69/abraao69/blob/main/Navy%20Blue%20Geometric%20Technology%20LinkedIn%20Banner%20(2).png" alt="Logo">
<img src="https://tse1.mm.bing.net/th?id=OIP.yv0UeJdij0kDxwbDsz9rgQHaC0&pid=Api&P=0&h=180" alt="Logo">

<div style="display: flex; align-items: center;">
  <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/fiocruz1.jpg?raw=true" alt="Logo">
  <br><br>
</div>
<div style="display: flex; align-items: center;">
  <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/fiocruz2.jpg?raw=true" alt="Logo">
  <br><br>
</div>
<div style="display: flex; align-items: center;">
  <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/fiocruz3.jpg?raw=true" alt="Logo">
  <br><br>
</div>
<div style="display: flex; align-items: center;">
  <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/fiocruz4.jpg?raw=true" alt="Logo">
  <br><br>
</div>

### Instalação do sistema:
```
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```
  
### Instalação do Docker:
Para instalação no linux mint segue a url:
https://linuxiac.com/how-to-install-docker-on-linux-mint-21/

```
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
```

```
echo "deb [arch=amd64 signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
$(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

```
sudo apt-get update
```

```
sudo apt-get install docker-ce docker-ce-cli containerd.io
```

Depois de instalado e configurado rode o Docker:
```
sudo service docker start
```

Testar se o serviço Docker está rodando corretamente:
```
sudo docker run hello-world  
```

### Docker-Compose - Instalação e configuração:
OBS: EM ALGUNS CASOS PODE ESTAR NO /usr/bin/docker-compose
```
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
```

```
sudo chmod +x /usr/local/bin/docker-compose
```

```
docker-compose --version  
```
  
##
### Para usar o Docker sem usar sudo:
https://docs.docker.com/engine/install/linux-postinstall/
  
##  
### Configurar para o fuso horário de São Paulo:
```
sudo timedatectl set-timezone America/Sao_Paulo
```
  
##
### Adicionar o repositório do PHP:
```
sudo add-apt-repository ppa:ondrej/php
```

##
### Instalar os pacotes do PHP instalado. Verificar com php version:
```
sudo apt-get install -y php8.2-cli php8.2-common php8.2-pgsql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath
```

##
### Install Composer:

```
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
```

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## Comandos para rodar o sistema:

Iniciar:  
```
sudo docker-compose up -d  
```
Parar:
```
sudo docker-compose down  
```
Remover instalação atual do wordpres e adicionar uma limpa:
```
sudo docker-compose down -v
```
Fazer o build dos containers analizando a construção:  
```
sudo docker-compose up --build  
```
Entrar dentro do container:
```
sudo docker exec -it 88e18972e19a /bin/bash
```
descobrir ip do container:
```
sudo docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' container-wordpress-3-wordpress-1
```

## Como acessar:

- Clonar o repositório
- Entre na pasta do repositório
- Execute o`docker-compose up` command
  - se você quiser executar em segundo plano, execute o comando `docker-compose up -d`
- Acesse o endereço `http://localhost:9092` to access phpmyadmin
  - acesso do usuário
    - user: mysql
    - password: mysql
    - host: mysql
  - root acesso
    - user: root
    - password: root
    - host: mysql
- Acesse o endereço `http://localhost:8006` para acessar o projeto

## Dados persistentes:

- mysql data: `./docker/mysql/dbdata`
- postgresql data: `./docker/postgresql/dbdata`
- redis data: `./docker/redis`


# Docker com PHP 8.3.4:

Este repositório tem como objetivo facilitar a criação de um ambiente de desenvolvimento com php 8.3.4

## O que tem no ambiente:

- [Nginx](https://www.nginx.com/)
- [PhpFpm](https://php.net/)
- [Apache2](https://httpd.apache.org/)
- [MySQL](https://www.mysql.com/)
- [MariaDB](https://mariadb.com/)
- [PhpMyAdmin](https://www.phpmyadmin.net/)
- [PgAdmin](https://www.pgadmin.org/)
- [PostgreSQL](https://www.postgresql.org/)
- [Redis](https://redis.io/)

## Pré-requisitos:

- [Install Docker](https://docs.docker.com/install/)
- [Install Docker Compose](https://docs.docker.com/compose/install/)

## PHP INI Config:
A configuração local do php.ini está localizada em`./docker/php/php.ini` file.

```ini
[PHP]
log_errors=On
xmlrpc_errors=On
html_errors=On
display_errors=On
display_startup_errors=On
report_memleaks=On
error_reporting=E_ALL
file_uploads=On
max_execution_time=120
max_input_time=120
session.gc_maxlifetime=1440
post_max_size=50M
upload_max_filesize=45M
max_file_uploads=20
variables_order="EGPCS"
max_input_vars=10000
max_input_nesting_level=64
date.timezone=UTC
memory_limit=512M
expose_php=On

[opcache]
opcache.enable=true
opcache.enable_cli=true
opcache.jit=tracing

[intl]
intl.default_locale=en_utf8

[xdebug]
xdebug.client_host=host.docker.internal
xdebug.client_port=9003
xdebug.discover_client_host=0
xdebug.start_with_request=yes
xdebug.remote_handler=dbgp
xdebug.idekey=PHPSTORM
xdebug.mode=debug,develop
xdebug.cli_color=1
```

## Módulos PHP:
```
[PHP Modules]
  apcu
  bcmath
  Core
  ctype
  curl
  date
  dom
  exif
  fileinfo
  filter
  gd
  gmp
  hash
  iconv
  imap
  intl
  json
  libxml
  mbstring
  mongodb
  mysqli
  mysqlnd
  openssl
  pcntl
  pcre
  PDO
  pdo_mysql
  pdo_pgsql
  pdo_sqlite
  pgsql
  Phar
  posix
  random
  readline
  redis
  Reflection
  session
  SimpleXML
  soap
  sockets
  sodium
  SPL
  sqlite3
  ssh2
  standard
  sysvmsg
  sysvsem
  sysvshm
  tokenizer
  xdebug
  xml
  xmlreader
  xmlwriter
  xsl
  yaml
  Zend OPcache
  zip
  zlib

[Zend Modules]
  Xdebug
  Zend OPcache
```
