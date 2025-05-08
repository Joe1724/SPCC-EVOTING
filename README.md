git clone https://github.com/Joe1724/SPCC-EVOTING
cd SPCC-EVOTING
composer install
composer update

npm install

cp .env.example .env
php artisan key:generate
php artisan storage:link

php artisan migrate --seed

npm run dev

php artisan serve
