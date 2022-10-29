##Setup Instructions


Install dependencies
```
composer install
npm install 
npm run dev
``` 

Copy .env file  for configurations

```
cp .env.example .env
```

Generate app key
```
php artisan key:generate
```

Database migration and seed data
```
php artisan migrate:fresh --seed
```

Run the local test server

```
php artisan serve
```


Run test

```
php artisan test
