# OBSS-app
> laravel 8 app on php7.3 and mysql5.7

## Prerequisites
Well tested on `Ubuntu 18.10`

## Install
clone project:
```bash
git clone https://github.com/toxab/OSBB.git
cd app
```

set up laravel permissions:
```bash
sudo chmod -R 777 laravel/bootstrap/cache
sudo chmod -R 777 laravel/storage
```

copy environment files:
```bash
cp .env.laravel laravel/.env
```

init docker containers && start project:
```bash
docker-compose up # first start (5-10 min)
# or
docker-compose up -d
```

create new DB:
```bash
#docker-compose exec mysql bash # -> open bash terminal for mysql
mysql -u root -p123456
SHOW DATABASES;
CREATE DATABASE laravel;

# open mysql client
address:  127.0.0.1 # or localhost
user:     root
password: 123456
port:     33061 # not 3306
```

init laravel:
```bash
docker-compose exec laravel bash # -> open bash terminal
composer install
php artisan key:generate
php artisan migrate
```
:rocket:
[:alien:](http://127.0.0.1:8081/)
