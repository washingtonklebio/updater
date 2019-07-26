#!/bin/bash

APP_DIR = "/usr/share/nginx/"

if [[ ! -d "$APP_DIR/vendor" ]]; then
    echo "Instalando dependências pelo Composer..."
    composer install > /dev/null
fi

if [[ ! -d "$APP_DIR/node_modules" ]]; then
    echo "Instalando dependências pelo NPM..."
    npm install > /dev/null
    echo "Gerando build dos assets..."
    npm run prod > /dev/null
fi

if [[ ! -f "$APP_DIR/.env" ]]; then
    echo "Criando arquivo .env..."
    cp "$APP_DIR/.env.example" "$APP_DIR/.env"
fi

echo "Gerando chave da aplicação..."
php artisan key:generate

echo "Alterando permissões da pasta storage..."
chmod 777 -R "$APP_DIR/storage"

cd $APP_DIR
echo "Gerando migrate do bando..."
php artisan migrate

docker-entrypoint $@