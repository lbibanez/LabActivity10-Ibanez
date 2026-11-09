# Lab Activity 10 - Barangay Bulletin

**Student:** Luis Ibanez  
**Site Title:** Barangay Bulletin - Purok Ibanez  

## Personalization Details
* **Posts Per Page:** 6 - The total number of letters in my last name ("Ibanez") is 6.
* **Custom Category:** Disaster Preparedness
* **Pinned Post Date:** 2026-05-05 (Birthday: May 5, 2005)

## How to Run Project

1. Install Dependencies 
Run commands:
composer install 
npm install 
2. Set up your environment 
In the terminal, run:
cp .env.example .env

Then generate the key:
php artisan key:generate 
3. Set up database
In the terminal, run:
touch database/database.sqlite 

Run migrations and seeders:
php artisan migrate:fesh --seed
4. Build assets and start the server: 
npm run build 
php artisan serve 