# Exchange Rates App

This Laravel application fetches currency exchange rates from the European Central Bank and stores them in a MySQL database. 
It provides both a REST API and web views to explore the data.


## Features

- Fetch exchange rates from ECB's XML feed
- Store and update them in MySQL
- View currency data through REST API endpoints (with filters + pagination)
- Filter currencies by currency_to


## Requirements

- PHP >= 8.2
- Composer
- MySQL
- Laravel 11
- XAMPP


## Setup Instructions

1. Clone the repository
git clone https://github.com/gregapostolakos/exchange-rates.git

2. Install dependencies
composer install

3. Create .env file
cp .env.example .env

4. Generate application key
php artisan key:generate

5. Set up database
Edit the .env file and set MySQL credentials like this

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=exchange_rates_db
DB_USERNAME=root
DB_PASSWORD=

Use phpMyAdmin (XAMPP) to create exchange_rates_db

6. Run migrations
php artisan migrate

7. Start server
php artisan serve


## Fetch & Store Currency Rates

http://127.0.0.1:8000/currency-rates


## API Endpoints

An endpoint to return all stored records (with pagination and filters).
http://127.0.0.1:8000/api/currencies 

An endpoint to return the information of a specific record
http://127.0.0.1:8000/api/currencies/{currency_to}

example : http://127.0.0.1:8000/api/currencies/USD