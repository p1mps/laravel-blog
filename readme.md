# Demo application with Laravel 5


## Running the application

Before all do a

```
composer update
```

inside the directory to install all the packages.

To run the application if you don't want to configure your webserver
just do a

```
php artisan serve
```

and you will have the applcation running at

[https://localhost:8000](https://localhost:8000)


Here there is also a possible configuration with Nginx plus php-fpm:


block="server {
    listen 80;
    server_name demo;
    root /vagrant/public;

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/eticostead.it-error.log error;

    error_page 404 /index.php;

    sendfile off;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}

I've used a Vagrant to run the application, just change the path to the root directory
and you will get the application running.

