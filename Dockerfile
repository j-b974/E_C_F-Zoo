# Utiliser une image PHP officielle avec Apache
FROM php:8.2-apache
# Configuration de l'environnement
ENV APACHE_DOCUMENT_ROOT=/var/www/ZooJose

# Installation des dépendances nécessaires
RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libonig-dev \
        libzip-dev \
        libssl-dev \
        libcurl4-openssl-dev \
        pkg-config \
        unzip \
        git \
        curl

# Installation des extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

#  Installer l'extension MongoDB
  RUN pecl install mongodb \
      && docker-php-ext-enable mongodb

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuration Apache
RUN a2enmod rewrite

# Copie des fichiers de l'application dans le conteneur
COPY ./ /var/www/ZooJose

# Copie Composer.json & composer.lock
COPY ./composer.* /var/www/ZooJose

# remplace la configuration de apache
COPY ./ServerZoo.conf /etc/apache2/sites-available/000-default.conf

# droit ecriture
RUN chown -R www-data:www-data /etc/apache2/sites-available/000-default.conf

# Configuration du propriétaire des fichiers
RUN chown -R www-data:www-data /var/www/ZooJose

# Installation des dépendances avec Composer
RUN cd /var/www/ZooJose \
    && composer install --no-scripts --no-interaction --no-cache \
    && composer update --no-scripts --no-interaction \
    && chown -R www-data:www-data /var/www/ZooJose/vendor

# change emplacement curseur commande
WORKDIR /var/www/ZooJose

RUN ls -al

# lance les commande a la création du contenaire
ENTRYPOINT ["bash", "docker.sh"]

#Exposition du port 80
EXPOSE 80

# Commande pour exécuter Apache
CMD ["apache2-foreground"]
