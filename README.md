# College Predictor System

A web-based college prediction system with user login and score-based college eligibility recommendations. Built with HTML, CSS, JavaScript, PHP, and MySQL, designed to run on Apache via XAMPP.

Originally based on [rishim9816/Web-Development-Project](https://github.com/rishim9816/Web-Development-Project).

## Features

- User registration and login with session management
- College predictor using board percentage and entrance exam scores (JEE, BITS, SRMJEEE, VITEEE)
- Responsive UI with Bootstrap and custom styling

## Tech Stack

- HTML, CSS, JavaScript
- PHP
- MySQL (MariaDB)
- XAMPP (Apache)

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP)

### Installation

1. Clone this repository into your XAMPP `htdocs` folder:

   ```bash
   git clone https://github.com/jcyangcn/college-predictor-system.git
   ```

2. Start **Apache** and **MySQL** from the XAMPP Control Panel.

3. Import the database schema in phpMyAdmin:
   - Open http://localhost/phpmyadmin
   - Create a database (e.g. `test_db`)
   - Import `usertable.sql`

4. Update database credentials in `login.php` if your MySQL setup differs from the default XAMPP config.

5. Open the app in your browser:

   ```
   http://localhost/college-predictor-system/login.php
   ```

## Project Structure

| File | Description |
|------|-------------|
| `login.php` | Login and registration page |
| `home.php` | College predictor form and results |
| `practice.php` | About page |
| `usertable.sql` | MySQL schema and sample users |
| `Login.css`, `Home.css`, `practice.css` | Stylesheets |
| `Login.js` | Client-side login helpers |

## License

This project is maintained as a portfolio fork. Please refer to the original repository for authorship details.
