# Getting Started
1. Modify the following from .env.example:
  ```
  DB_DATABASE=homestead
  DB_USERNAME=homestead
  DB_PASSWORD=secret
  ```
with the proper values. Then, save as .env

2. Generate key:
  ```
  php artisan key:generate
  ```
  
3. Run the web server (Wamp, Xamp, etc.)
4. If you don't have the DB dump, run migration:
  ```
  php artisan migrate
  ```
5. Seed an admin:
  ```
  php artisan db:seed
  ```
Credentials:
email: admin@example.com
PW: adminadmin

6. Serve the project:
  ```
  php artisan serve
  ```
