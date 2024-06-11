#
# Copyright The Asahi Shimbun Company. All rights reserved.
#
# For the full copyright and license information,
# please view the LICENSE file that was distributed with this source code.
#

#-- [ Build PHP Environment ]-------------------------------
FROM php:8.2.11-fpm-bullseye as php-build-stage
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8

# Install deb packages
RUN apt-get update; \
    apt-get install -y gpg libicu-dev libonig-dev libzip-dev unzip locales curl procps inotify-tools wkhtmltopdf fonts-ipafont; \
    apt-get clean; \
    mkdir -p /etc/apt/keyrings; \
    rm -rf /var/lib/apt/lists/*

# NodeJS Environment
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg; \
    echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list; \
    apt-get update; \
    apt-get install -y nodejs

# Environment
ARG TZ=Asia/Tokyo
RUN locale-gen en_US.UTF-8; \
    localedef -f UTF-8 -i en_US en_US.UTF-8; \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime; \
    echo $TZ > /etc/timezone

# PHP Setup
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions; \
    mkdir /var/run/php-fpm; \
    install-php-extensions bcmath gd gettext intl mcrypt mysqli opcache pcntl pdo_mysql redis xsl zip exif
 

#-- [ Build PHP App Environment ]---------------------------
FROM php-build-stage as php-app-build-stage

# Setup Work directory
ENV APP_HOME /work/backend
RUN mkdir -p $APP_HOME

VOLUME  $APP_HOME
WORKDIR $APP_HOME

# COPY .  $APP_HOME
# COPY ./docker/env.dev/php-laravel/.env         $APP_HOME/.env
# COPY ./docker/env.dev/php-laravel/php.ini      /usr/local/etc/php/
# COPY ./docker/env.dev/php-laravel/php-fpm.d/*  /usr/local/etc/php-fpm.d/

# PHP Setup && NPM Build
# RUN mkdir -p $APP_HOME/storage/framework/aop/compile; \
#     mkdir -p $APP_HOME/storage/framework/cache/data; \
#     mkdir -p $APP_HOME/storage/framework/sessions; \
#     mkdir -p $APP_HOME/storage/framework/testing; \
#     mkdir -p $APP_HOME/storage/framework/views; \
#     php artisan storage:link; \
#     chmod -R 777 $APP_HOME/storage; \
#     chmod -R 777 $APP_HOME/bootstrap/cache;

# Assets Build
# RUN cd $APP_HOME && npm install && npm run build
