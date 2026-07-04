# College Predictor System

A web-based college prediction system with user login and score-based college eligibility recommendations. Built with HTML, CSS, JavaScript, PHP, and MySQL, designed to run on Apache via XAMPP.

Originally based on [rishim9816/Web-Development-Project](https://github.com/rishim9816/Web-Development-Project).

## Features

- User registration and login with session management
- College predictor using board percentage and entrance exam scores (JEE, BITS, SRMJEEE, VITEEE)
- Responsive UI with Bootstrap and custom styling
- Centralized database configuration
- Form validation and user feedback messages

## Screenshots

| Login | Predictor | About |
|-------|-----------|-------|
| ![Login](ScreenShots/is1.JPG) | ![Predictor](ScreenShots/is2.JPG) | ![About](ScreenShots/is3.JPG) |

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

4. Update database credentials in `config.php` if your MySQL setup differs from the default XAMPP config.

5. Open the app in your browser:

   ```
   http://localhost/college-predictor-system/
   ```

## Project Structure

| File | Description |
|------|-------------|
| `index.php` | Entry point redirecting to login |
| `config.php` | Database connection and shared helpers |
| `login.php` | Login and registration page |
| `home.php` | College predictor form and results |
| `practice.php` | About page |
| `usertable.sql` | MySQL schema and sample users |
| `Login.css`, `Home.css`, `practice.css` | Stylesheets |
| `Login.js` | Client-side login helpers |

## My Contributions

- Added centralized `config.php` for database settings
- Fixed login redirect and session handling bugs
- Improved signup validation and user feedback messages
- Fixed broken navigation links and branding typos
- Added numeric input validation for predictor scores
- Added screenshots and improved documentation

## License

This project is maintained as a portfolio fork. Please refer to the original repository for authorship details.
