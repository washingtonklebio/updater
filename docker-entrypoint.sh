#!/bin/sh

cd /usr/share/nginx/


echo "Instalando dependências pelo Composer..."
composer install > /dev/null

echo "Instalando dependências NPM..."
npm install > /dev/null
echo "Gerando build dos assets..."
npm run prod > /dev/null

echo "Instalando vuetify e suas dependências..."
npm install vuetify --save
npm install @mdi/font -D
npm install material-design-icons-iconfont -D

echo "Gerando chave da aplicação..."
php artisan key:generate


echo "Adicionando permissões a pasta storage..."
chmod 646 -R storage/logs/
chmod 647 -R storage/framework/sessions/
chmod 647 -R storage/framework/views/

echo "Aguarde a iniciação da migração do banco de dados..."
sleep 100

echo "Gerando migrate da aplicação..."
php artisan migrate

echo "Gerando seeds da aplicação..."
php artisan db:seed

# Update nginx to match worker_processes to no. of cpu's
procs=$(cat /proc/cpuinfo |grep processor | wc -l)
sed -i -e "s/worker_processes  1/worker_processes $procs/" /etc/nginx/nginx.conf

# Always chown webroot for better mounting
chown -Rf nginx.nginx /usr/share/nginx/html

# Start supervisord and services
/usr/local/bin/supervisord -n -c /etc/supervisord.conf