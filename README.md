# hostby-panel

## The best way to host your laravel application

[![License: BSD](https://img.shields.io/badge/License-BSD-green.svg)](https://opensource.org/licenses/BSD)

> #### PS: This repository is only for a test demonstration

### Requirements

* PHP >= 7.4
* Composer PHP >= 1.9.0

PHP extensions:

* OpenSSL
* BCMath
* Fileinfo
* PDO
* Mbstring
* Tokenizer
* XML
* Ctype
* JSON

Supported databases

* MySQL 5.6+
* PostgreSQL 9.4+
* SQLite 3.8.8+
* SQL Server 2017+

### Installation

Clone the repository

```bash
git clone https://github.com/Atiladanvi/hostby-panel.git
```

Switch to the repo folder

```bash
cd hostby-panel
```

Install all the dependencies using composer

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
```

Set the database connection in `.env`

```
DB_CONNECTION=<mysql|pgsql|sqlite|sqlsrv>
DB_HOST=<host>
DB_PORT=<port>
DB_DATABASE=<databse name>
DB_USERNAME=<database user>
DB_PASSWORD=<database password>
```

Clean the application cache

```bash
php artisan optimize 
```

Run the green setup

```bash
php artisan hostby:setup
```

Start the local development server

```bash
php artisan serve
```

You can access the server at http://localhost:8000

Finally, now you can login as administrator with follows credentials:

**E-mail**: admin@hostby.dev

**Password**: hostByIsTheWay

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email `atila.danvi@outlook.com` instead of using the issue tracker.

### Credits

- [Atila Silva](https://github.com/Atiladanvi)
- [All Contributors](../../contributors)

### License

The BSD License. Please see [license file](LICENSE.md) for more information.
