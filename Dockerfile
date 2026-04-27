FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Suppress ServerName warning + allow .htaccess overrides
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copy application source
COPY . .

# Download placeholder banner images (1920x600 ensures > 300 KB each)
RUN mkdir -p images \
    && curl -fsSL -o images/banner1.jpg "https://picsum.photos/seed/ltw2a/1920/600" \
    && curl -fsSL -o images/banner2.jpg "https://picsum.photos/seed/ltw2b/1920/600" \
    && curl -fsSL -o images/banner3.jpg "https://picsum.photos/seed/ltw2c/1920/600"

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
