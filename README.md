# Updater
> Sistema de controle de versões

Updater é um software gratuito capaz de gerênciar pequenos ou grandes projetos, fornecendo 
suporte a instalação, documentação e todo o controle de versionamento necessário para uma 
aplicação.

## Pré-requitos

### Linux

```
git
docker
docker-containe
```

## Instalação:

### Linux

#### Clona o projeto Updater
```sh
cd /home/user_name
git clone https://github.com/washingtonklebio/updater.git
cd updater
```

#### Cria e inicia os containers
```sh
docker-compose up -d --build
```

#### Ao finalizar entre no container principal do projeto [updater_updater-app_1]
```sh
docker exec -ti updater_updater-app_1 bash
```

> Dentro do container principal execute os seguintes comandos:

#### Cria o arquivo .env
```sh
cp .env.example .env
```
_(Obs: configure o arquivo .env de acodo com os dados do arquivo [docker-compose.yaml])_

#### Instala o projeto
```sh
composer install
npm install
php artisan key:generate
php artisan migrate
```

#### Ajusta as permissões
```sh
chmod 646 -R storage/logs/
chmod 647 -R storage/framework/sessions/
chmod 647 -R storage/framework/views/
chmod 647 -R storage/framework/cache/
```

# Comandos 'docker-composer'
```sh
docker-compose up          // Cria e inicia os containers
docker-compose down        // Para e remove os containers, networks, images, e volumes

docker-compose start       // Inicia serviços
docker-compose restart     // Reinicia serviços
docker-compose stop        // Para serviços
```
