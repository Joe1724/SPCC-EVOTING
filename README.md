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

## Seeding Nominees

The system includes a convenient command to seed nominee data with images:

```bash
# Seed with simple avatar images
php artisan nominees:seed

# Seed with realistic photos
php artisan nominees:seed --real-photos

# Clear existing nominees and reseed
php artisan nominees:seed --fresh

# Combine options
php artisan nominees:seed --fresh --real-photos
```

See `SEEDER_INSTRUCTIONS.md` for more details.
