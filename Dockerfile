# Usar imagem oficial do PHP com Apache
FROM php:8.3-apache

# Instalar dependências do sistema necessárias para compilar extensões PHP
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Instalar e habilitar extensão MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Habilitar mod_rewrite do Apache (opcional, se precisar de URLs amigáveis)
RUN a2enmod rewrite

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todo o código da aplicação para o container
WORKDIR /var/www/html
COPY . .

# Instalar dependências do Composer
RUN composer install

# Expor a porta padrão do Apache
EXPOSE 80

# Comando para iniciar o Apache no foreground
CMD ["apache2-foreground"]
