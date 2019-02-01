Step to setup this project:
1. git clone
2. cd into the folder
3. composer install
4. cp .env.example .env
5. configure the .env file accordingly. Elements that needed to be changed are database name,database user,database password.
6. php artisan key:generate
7. create a database. Name it tenant.
8. php artisan migrate

YOU'RE GOOD TO GO!
