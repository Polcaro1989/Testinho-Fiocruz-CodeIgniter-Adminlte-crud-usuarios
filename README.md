# Sistema Codeinigther em container Docker.  
  
<div style="display: flex; align-items: center;">
  <img src="https://github.com/abraao69/Setup-Docker-PHP-7.4/blob/master/logo.png" alt="Logo" width="200" height="100">
  <br><br>
</div>
  
CRÉDITOS AO AUTOR DO Testinho CMS  Bootstrap+Wordpress:  
https://github.com/abraao69  
  
  
O servidor está configurado com muitos complementos, sendo grande parte deles necessários para o pleno funcionamento.  
Obs: Esse projeto é bom para personalizar outros projetos web também.  
  
## Comandos para pleno funcionamento do sistema:
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
docker-compose down -v
```
Fazer o build dos containers analizando a construção:  
```
docker-compose up --build  
```
Entrar dentro do container:
```
docker exec -it 88e18972e19a /bin/bash
```
descobrir ip do container:
```
docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' container-wordpress-3-wordpress-1
```  
  
### Instalação de algumas dependências
```
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```
  
### Instalação do Docker
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
### Para usar o Docker sem usar sudo
https://docs.docker.com/engine/install/linux-postinstall/
  
##  
### Configurar para o fuso horário de São Paulo
```
sudo timedatectl set-timezone America/Sao_Paulo
```
  
##
### Adicionar o repositório do PHP:
```
sudo add-apt-repository ppa:ondrej/php
```

##
### Instalar os pacotes do PHP instalado. Verificar com php version.
```
sudo apt-get install -y php8.2-cli php8.2-common php8.2-pgsql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath
```

##
### Install Composer

```
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
```

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

```
sudo apt-get install composer
```

