# FAQ Application

## Overview

This is a simple PHP-based web application developed as part of a Technical Aptitude Test.

The application displays a list of Frequently Asked Questions (FAQs) and allows users to "Like" individual answers. The like count updates dynamically without reloading the page using an asynchronous API request.

---

## Requirements

- PHP 8.x (recommended)
- MySQL
- XAMPP (or any Apache + MySQL local server)
- Web Browser

---

## Setup Instructions

### 1. Clone or Download the Project

Place the project folder inside:

C:\xampp\htdocs\

Example path:

C:\xampp\htdocs\faq-app

---

### 2. Start Local Server

Open XAMPP and start:

- Apache
- MySQL

---

### 3. Database Creation

Open phpMyAdmin:

http://localhost/phpmyadmin

Create a new database:

faq_app

---

### 4. Create Table

Run the following SQL query:

```sql
CREATE TABLE faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    likes_count INT DEFAULT 0
);
```

---

### 5. Seed Sample Data

Run the following SQL query to insert sample FAQ records:

```sql
INSERT INTO faqs (title, content, likes_count) VALUES
('title1', 'content1', 0),
('title2', 'content2', 0),
('title3', 'content3', 0);
```

---

### 6. Database Connection Details

The application connects to MySQL using the following configuration:

Host: localhost  
Port: 3307 (or 3306 if using default)  
Database Name: faq_app  
Username: root  
Password: (empty by default in XAMPP)

These values can be configured in:

`config.php`

---

## Project Structure Overview

The project follows a simple and clean structure:

- index.php  
  Displays all FAQ questions and their like counts.

- api.php  
  Handles AJAX requests (e.g., liking an FAQ). Updates the database and returns a JSON response.

- config.php  
  Contains the database connection configuration.

- css/style.css  
  Contains all styling for the application.

The application works as follows:

1. index.php fetches FAQs from the database and displays them.
2. When a user clicks the "Like" button, JavaScript sends an AJAX request to api.php.
3. api.php updates the likes_count in the database.
4. A JSON response is returned and the like count updates dynamically without page reload.
