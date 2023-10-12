![Static Badge](https://img.shields.io/badge/PHP-8.2-blue)
![Static Badge](https://img.shields.io/badge/MySQL-8.1.0-blue)
![Static Badge](https://img.shields.io/badge/Apache-2.4.57-blue)
![Static Badge](https://img.shields.io/badge/Linux-debian_11_slim-blue)
![Static Badge](https://img.shields.io/badge/Symfony-6.3-blue)

![license](https://img.shields.io/github/license/kartano/ruffian)
![contributors](https://img.shields.io/github/contributors/kartano/ruffian)
![branch](https://img.shields.io/github/last-commit/kartano/ruffian/master)
![GitHub commit activity (branch)](https://img.shields.io/github/commit-activity/t/kartano/ruffian)
![issues](https://img.shields.io/github/issues/kartano/ruffian)
![tag](https://img.shields.io/github/v/tag/kartano/ruffian)

![Discord](https://img.shields.io/discord/1156682386340319332)

# [Ruffian](https://en.wikipedia.org/wiki/Captain_Haddock)

A RESTful API to simply return random Captain Haddock insults.

<!-- TOC -->
* [Requirements](#requirements)
    * [Must-haves](#must-haves)
    * [Nice-to-haves](#nice-to-haves)
* [Containers](#containers)
    * [Create Environment File](#create-environment-file)
    * [Building and Running](#building-and-running)
    * [Database](#database)
* [Troubleshooting](#troubleshooting)
* [Licensing](#licensing)
<!-- TOC -->

## Requirements

### Must-haves

* [Docker Desktop](https://www.docker.com/products/docker-desktop/)
* [Git version control](https://git-scm.com/downloads)

### Nice-to-haves

* [PHPStorm by JetBrains](https://www.jetbrains.com/phpstorm/)
* [Navicat for MySQL](https://navicat.com/en/products/navicat-for-mysql)

## Containers

### Create Environment File

1. Create a UNIX style file for environment settings and save it outside the repo, such as as `%USERPROFILE%\env.txt`

**Do NOT add this file to the repo.**

```
# Application settings
APPLICATION_ENV=local
DEVELOPER_ENV=FIXME YOURNAME
MYSQL_ROOT_PASSWORD=FIXME YOUR MYSQL ROOT PASSWORD
MYSQL_DATABASE=ruffian
MYSQL_USER=FIXME YOUR NORMAL MYSQL USER
MYSQL_PASSWORD=FIXME YOUR NORMAL MYSQL USER PASSWORD

# Used by Symfony and migrations
DATABASE_URL="mysql://WHATEVER MYSQL_USER IS:WHATEVER MYSQL_PASSWORD IS@ruffian-mysql-1:3306/ruffian?serverVersion=8.1.0"
```

### Building and Running

1. Use Docker Composer to build and then run the container.

```bash
docker-compose --env-file $Env:USERPROFILE\env.txt build --pull
docker-compose --env-file $Env:USERPROFILE\env.txt up -d 
```

2. Open Docker or an SSH terminal and get dependances installed:

```bash
cd /srv/www
composer update
```

3. Make sure you can connect to the MySQL server using the above logins, using port 3307.
4. Make sure the web server is up - `http://localhost:80`

### Database

1. Create the database if it doesn't exist:

```bash
cd /srv/www
php bin/console doctrine:database:create
```

2. Run migrations to build the database:

```bash
cd /srv/www
php bin/console doctrine:migrations:migrate
```

3. ANY CHANGES you make to entities, attributes etc MUST be handled through Symfony migrations.  See the [Symfony Migration article](https://symfony.com/doc/current/doctrine.html#migrations-adding-more-fields).

## Troubleshooting

Please add [issues and tickets](https://github.com/kartano/ruffian/issues) to the project's Github page.

* Routes

Check that your route is handled by Symfony:

```bash
cd /srv/www
php bin/console debug:router
# List of all routes appears
php bin/console router:match /your/route/1
# You'll get info about how this route is handled, or an error
```

Try clearing the Symfony cache:

```bash
cd /srv/www
php bin/console cache:pool:list
```

## Licensing

This software is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details
