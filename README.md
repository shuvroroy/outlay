![Outlay](./public/img/logo/dark.svg)

> Outlay is an expense tracker app build with TALL stack.

![](https://icecube-eu-286.icedrive.io/thumbnail?p=JLMnGneBAxTGx8af9netq7sg2p8NPpio235P7mQl8pqhIqGhSvTPpR%2Fb7Art5rH5SmGoP8x0gji1DMlf5UZdLjeKJpoMgvh6OMwOLcVYGY4Up85qbA5l0jo%2FOGz5%2Fr9h&w=1280&h=1280)

## Installation

Clone the repo locally:

```sh
git clone https://github.com/shuvroroy/outlay.git outlay
cd outlay
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Edit .env and set your database connection details.

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=outlay
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit outlay in your browser, and login with:

- **Username:** john@outlay.test
- **Password:** password

## Special Thanks

- [Mohammad Emran Hasan](http://github.com/phpfour)
