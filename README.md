# Arthienne

Arthienne is a full stack web platform focused on the exhibition, auction, discussion, and discovery of artworks.  
The platform supports buyers, sellers, and site managers with role based access and dedicated dashboards.

The project is built using PHP with an MVC architecture, PostgreSQL for data storage, and runs locally using XAMPP.

---

## Features

### Public
- Browse exhibitions, auctions, direct deals, and forums
- View FAQs and Terms and Conditions loaded from the database
- Submit contact requests

### Buyers and Sellers
- Secure account creation with password hashing
- Login and logout
- Personal dashboard after login
- Edit registered profile information
- Participate in discussion forums and post comments
- Role based access control

### Admin (Site Manager)
- Secure admin authentication
- Admin dashboard
- Create and edit FAQs
- Create and edit Terms and Conditions
- View contact requests submitted by users
- View user details linked to contact requests

---

## Tech Stack

- PHP 8+
- PostgreSQL
- PDO for database access
- HTML, CSS, JavaScript
- MVC architecture
- XAMPP (Apache and PHP)

---
## Project Structure

arthienne/

│

├── app/

│ ├── controllers/

│ ├── core/

│ │ ├── Database.php

│ │ └── Router.php

│ ├── views/

│ │ ├── pages/

│ │ ├── admin/

│ │ └── layouts/

│

├── public/

│ ├── css/

│ ├── js/

│ ├── assets/

│ └── index.php

│

└── README.md

---

## Requirements

### Software
- XAMPP (latest recommended)
- PostgreSQL 13 or higher
- PHP 8.0 or higher
- Modern web browser

---

## XAMPP Setup with PostgreSQL

XAMPP does not include PostgreSQL by default. PostgreSQL must be installed separately.

### 1. Install XAMPP
Download and install XAMPP from:
https://www.apachefriends.org/

Make sure Apache and PHP are selected during installation.

---

### 2. Install PostgreSQL
Download PostgreSQL from:
https://www.postgresql.org/download/

During installation:
- Note the port number (default is 5432)
- Set a password for the postgres user
- Install pgAdmin when prompted (recommended)

---

### 3. Enable PostgreSQL PDO in PHP

Open the file:

---

## Requirements

### Software
- XAMPP (latest recommended)
- PostgreSQL 13 or higher
- PHP 8.0 or higher
- Modern web browser

---

## XAMPP Setup with PostgreSQL

XAMPP does not include PostgreSQL by default. PostgreSQL must be installed separately.

### 1. Install XAMPP
Download and install XAMPP from:
https://www.apachefriends.org/

Make sure Apache and PHP are selected during installation.

---

### 2. Install PostgreSQL
Download PostgreSQL from:
https://www.postgresql.org/download/

During installation:
- Note the port number (default is 5432)
- Set a password for the postgres user
- Install pgAdmin when prompted (recommended)

---

### 3. Enable PostgreSQL PDO in PHP

Open the file:

xampp/php/php.ini

Ensure the following extensions are enabled (no semicolon at the beginning):

extension=pdo_pgsql
extension=pgsql


Restart Apache after saving the file.

---

## Database Setup

### 1. Create Database
Using pgAdmin or psql, create a database named:


---

### 2. Run SQL Schema
Run the provided SQL schema to create all required tables including:
- Buyer
- Seller
- SiteManager
- Exhibitions
- Forums
- ForumComment
- FAQ
- Terms
- ContactMessage
- Relationship tables

---

### 3. Configure Database Connection

Edit the following file:
app/core/Database.php


Update the credentials to match your PostgreSQL setup:

php
private $host = '127.0.0.1';
private $port = '5432';
private $dbname = 'arthienne';
private $username = 'postgres';
private $password = 'your_password_here';

Running the Project

Move the project folder into:
xampp/htdocs/arthienne
Start Apache from the XAMPP Control Panel
Ensure the PostgreSQL service is running
Open your browser and navigate to:
http://localhost/arthienne/public

Authentication and Sessions
Passwords are stored using PHP password hashing
Authentication is session based
User roles are stored in the session
Access control is enforced in controllers

Security Practices
Prepared SQL statements used throughout
Password hashing with password_hash
Session based authentication
Role checks on protected routes

Future Improvements
Pagination for large datasets
Forum moderation tools
Artwork uploads and management
Payment gateway integration
Deployment configuration for production

Author
This project was built as a full stack academic and practical implementation with a focus on clean architecture, security, and maintainability.
