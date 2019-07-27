# Updater

Updater é um software gratuito capaz de gerênciar pequenos ou grandes projetos, fornecendo 
suporte a instalação, documentação e todo o controle de versionamento necessário para uma 
aplicação.

Instalação linux:

# Clona o projeto Updater
cd /home/user_name
git clone https://github.com/washingtonklebio/updater.git
cd updater

# Cria e inicia os containers
docker-compose up -d --build

# Ao finalizar entre no container principal do projeto [updater_updater-app_1]
docker exec -ti updater_updater-app_1 bash

>> Dentro do container principal execute os seguintes comandos: <<

# Cria o arquivo .env
cp .env.example .env
(Obs: configure o arquivo .env de acodo com os dados do arquivo [docker-compose.yaml])

# Instala o projeto
composer install
npm install
php artisan key:generate
php artisan migrate

# Ajusta as permissões
chmod 646 -R storage/logs/
chmod 647 -R storage/framework/sessions/
chmod 647 -R storage/framework/views/

# Comandos 'docker-composer'
docker-compose up          // Cria e inicia os containers
docker-compose down        // Para e remove os containers, networks, images, e volumes

docker-compose start       // Inicia serviços
docker-compose restart     // Reinicia serviços
docker-compose stop        // Para serviços
