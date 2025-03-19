# BlogDB

BlogDB is a simple blog application that allows users to register, log in, and manage blog posts. The application is built using PHP and MySQL.

## Features

- User registration and login
- User roles (admin and user)
- Create, edit, view, and delete blog posts
- Authentication and authorization

## Database Schema

The application uses a MySQL database with the following schema:

```sql
CREATE DATABASE BlogDB COLLATE utf8mb4_unicode_ci;

USE BlogDB;

CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(64) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
);

CREATE TABLE posts(
    `id` int unsigned  auto_increment PRIMARY KEY,
    `title` varchar(255) not null,
    `content` text not null,
    `created_at` datetime default now()
);
```

## Requirements

- PHP 8.2
- MySQL 5.6 or higher
- Web server (Apache, Nginx, etc.)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/Hatem-Mohammed-toma/BlogDB.git
```

2. Navigate to the project directory:

```bash
cd BlogDB
```

3. Import the database schema:

```bash
mysql -u YOUR_USERNAME -p BlogDB < database.sql
```

4. Configure the database connection in `inc/connect.php`:

```php
<?php
$servername = "YOUR_SERVER_NAME";
$username = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$dbname = "BlogDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

5. Start a local PHP server:

```bash
php -S localhost:8000
```

6. Open your browser and navigate to `http://localhost:8000`.

## Usage

- Register a new user account.
- Log in with your credentials.
- Create, edit, and delete blog posts as an admin.
- View blog posts as a user.
- To add a new post, click on the "Add a new post" link and fill out the form.
- To view a post, click on the "View" link next to the post.
- To edit a post, click on the "edit post" link in the view post page.
- To delete a post, click on the "delete post" button in the view post page.

## File Structure

```
├── inc
│   ├── connect.php
│   ├── errors.php
│   ├── success.php
├── handle
│   ├── addpost.php
│   ├── deletepost.php
│   ├── editpost.php
│   ├── login.php
│   ├── register.php
├── index.php
├── login.php
├── register.php
├── viewPost.php
├── editPost.php
├── addPost.php
├── database.sql
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the MIT License.
