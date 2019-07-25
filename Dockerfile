FROM wyveo/nginx-php-fpm:latest

WORKDIR /usr/share/nginx/

RUN rm -rf /usr/share/nginx/html

# Criando link simbólico de html para public
RUN ln -s public html

RUN apt-get update && apt-get install -y \
curl \
vim \
git \
cron \
unzip

# Instalando composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Instalando node.js
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
    apt-get install -y nodejs

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY docker-entrypoint.sh /usr/local/bin/

RUN chmod 777 /usr/local/bin/docker-entrypoint.sh \
    && ln -s /usr/local/bin/docker-entrypoint.sh /

ENTRYPOINT ["docker-entrypoint.sh"]