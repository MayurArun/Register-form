# Simple Web Authentication System

This repository contains a simple web application for user authentication using PHP, HTML, and MySQL.

## Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Setup](#setup)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Overview

The project consists of two main pages:
- **Login Page (`login.php`):**
  - Allows users to log in by entering their email and password.
- **Registration Page (`registration_page.php`):**
  - Allows users to register by providing their name, email, password, address, and phone number.

Additionally, a PHP script is included for handling user registration (`registration_script.php`).

## Features

- User authentication with email and password.
- User registration with name, email, password, address, and phone number.
- MySQL database integration for storing user information.
- Simple web forms for login and registration.

## Setup

1. **Prerequisites:**
   - Install a web server with PHP support (e.g., XAMPP, WampServer).
   - Set up a MySQL database named `register_db` with a table named `user` having columns (`id`, `name`, `email`, `password`, `address`, `phone`).

2. **Configuration:**
   - Update the database connection parameters in the PHP code:
     - Open `login.php` and `registration_page.php` to set the database connection details (hostname, username, password).
     - Open `registration_script.php` to configure the database connection.

3. **Run:**
   - Save the files in the web server's document root.
   - Access the login and registration pages through a web browser.

## Usage

1. **Login:**
   - Open `login.php` in a web browser.
   - Enter your email and password.
   - Click on the "LOG IN" button.

2. **Registration:**
   - Open `registration_page.php` in a web browser.
   - Fill in the registration form with your details.
   - Click on the "REGISTER" button.

## Contributing

Contributions are welcome! Please follow the [contribution guidelines](CONTRIBUTING.md).
