# [Ruffian](https://en.wikipedia.org/wiki/Captain_Haddock)

A RESTful API to simply return random Captain Haddock insults.

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

```
docker-compose --env-file $Env:USERPROFILE\env.txt build --pull
docker-compose --env-file $Env:USERPROFILE\env.txt up -d 
```

2. Open Docker or an SSH terminal and get dependances installed:

```
cd /srv/www
composer update
```

3. Make sure you can connect to the MySQL server using the above logins, using port 3307.
4. Make sure the web server is up - `http://localhost:80`

### Database

1. Create the database if it doesn't exist:

```
cd /srv/www
php bin/console doctrine:database:create
```

2. Run migrations to build the database:

```
cd /srv/www
php bin/console doctrine:migrations:migrate
```

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
