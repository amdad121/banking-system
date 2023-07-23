# Banking Management

This is simple Banking Management System.

# Run this project

Fist clone the project

```sh
git clone https://github.com/amdad121/banking-system
```

then go to project directory

```sh
cd banking-system
```

change branch to dev.001

```sh
git checkout dev.001
```

and run

```sh
composer install
```

you need to copy .env.example to .env

```sh
cp .env.example .env
```

to generate app key run this command

```sh
php artisan key:generate
```

After that you need Database setup on .env file

then you run this command

```sh
php artisan migrate --seed
```

Install node dependencies and build

```sh
npm install

npm run build
```

then you run this command

```sh
php artisan serve
```

Now register an user and check.
