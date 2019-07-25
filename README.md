# Updater

Updater é um software gratuito capaz de gerênciar pequenos ou grandes projetos, fornecendo 
suporte a instalação, documentação e todo o controle de versionamento necessário para uma 
aplicação.

Instalação:

Na raiz do projeto executa os seguintes comandos separadamente:

1º - composer install

2º - npm install

- Crie o arquivo .env

cp .env.example .env

Obs: configure o arquivo .env de acodo com os dados do arquivo [docker-compose.yaml]

3º docker-compose up -d --build

Ao finalizar entre no container que possui a imagem [updater_updater-app].

docker exec -ti nome_do_container bash

4º php artisan key:generate

5º php artisan migrate

Encerrar as containers:

docker-compose down