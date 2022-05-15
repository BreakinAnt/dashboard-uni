### Requirements
- PHP 7.4 or superior
- Laravel
- Composer 2.0 or superior
- Database server (MySQL 8.0 is recommended)

### How to run
- Run ```composer install```, ``` php artisan migrate --seed ``` and ``` php artisan key:generate ```
- You can run ``` php artisan db:seed --class=FactorySeeder ``` to populate your database with fake data.
- Start the project by running ``` php artisan serve ```

Don't forget to configure your .env correctly.
