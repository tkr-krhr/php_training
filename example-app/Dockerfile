FROM php:7.4-apache

# PHP拡張機能のインストール
RUN docker-php-ext-install mysqli pdo_mysql

# Apacheの設定
RUN a2enmod rewrite

