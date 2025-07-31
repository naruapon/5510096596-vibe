# PHP Sample Application

This repository contains a small PHP and HTML application that demonstrates basic user management features. The pages rely on a MySQL database named `shop` and use simple forms for login, registration and searching. An additional script showcases how to insert data using PHP's PDO extension.

## Setup

1. Create a database named `shop` and import the structure from `shop.sql` (or `shop (1).sql`).
   ```sh
   mysql -u root -p shop < shop.sql
   ```
   The PHP scripts expect the database to be available on `localhost` with user `root` and an empty password. Adjust the connection details in the PHP files if your environment differs.

2. Serve the repository with a PHP‐capable web server. For quick testing you can run
   ```sh
   php -S localhost:8000
   ```
   and then browse to `http://localhost:8000/index.html`.

## File overview

- **index.html** – simple login form.
- **check_login.php** – checks credentials from the `user` table, sets cookies and redirects to `show.php`.
- **show.php** – displays user data if a valid login cookie is present.
- **logout.php** – clears cookies created during login.
- **formtest.html** – registration form used by `test.php`.
- **test.php** – inserts a new user into the database and shows submitted values.
- **test_pdo.php** – alternative registration handler that demonstrates using PDO for database access.
- **formprovince.html** and **showbyprovince.php** – show users filtered by province.
- **search.php** – search users by name.
- **edit.php** – page for editing a user (expects a missing `update.php`).
- **cookie.php** – displays stored cookies.
- **shop.sql** – MySQL dump of the `user` table with example data.

The `img` directory contains a sample image used by some of the pages.

## Notes

This code is provided for demonstration purposes and does not include authentication best practices. Passwords are stored in plain text and no input validation is implemented.

