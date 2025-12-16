# Travel Destination Management System

A PHP-based web application for managing travel destinations, user accounts, and favorite destinations with authentication and a responsive user interface.

## Quick Start

### Prerequisites

- PHP 7.4 or higher
- MySQL database
- Web server (Apache, Nginx, etc.)

### Setup

1. **Clone the repository**

   ```bash
   git clone <repository-url>
   cd Travel
   ```

2. **Configure database** (required - not in git for security)

   - Copy `config.example.php` to `config.php`
   - Update database credentials:
     ```php
     $db_host = 'localhost';
     $db_user = 'root';
     $db_pass = 'your_password';
     $db_name = 'travel';
     ```

3. **Set up database**

   - Import `database.sql` into your MySQL server
   - Creates `users`, `destinations`, and `favourites` tables

4. **Access the application**
   ```
   http://localhost/Travel/index.php
   ```

## File Organization

### Pages

- `index.php` - Entry point (redirects to login/dashboard)
- `login.php` / `register.php` - Authentication
- `first.php` - Main dashboard
- `destinations.php` / `favourite.php` - Browse and manage destinations
- `account.php` - User profile management
- `gallery.php` - Image gallery

### Backend

- `add_hearted_destinations.php` - Add to favorites (AJAX)
- `check_hearted_destinations.php` - Check favorite status (AJAX)
- `delete_favourite.php` - Remove from favorites (AJAX)
- `update_process.php` - Update account (AJAX)
- `delete.php` - Delete account
- `logout.php` - Session cleanup

### Styling & Scripts

- `*.css` - Page styles (first.css, login.css, destinations.css, etc.)
- `first.js`, `main.js` - Client-side functionality

## What's Not in Git

These files are git-ignored for security and size:

- `config.php` - Database credentials (create from config.example.php)
- `Media/` - Large image files
- Documentation files (\*.md)
- Test files (test_connection.php, run_test.html)

## Running Locally

1. Start your PHP server:

   ```bash
   php -S localhost:8000
   ```

2. Visit `http://localhost:8000/index.php`

## Features

- User authentication with sessions
- Browse travel destinations
- Add/remove favorites
- Manage user profile
- Image gallery with horizontal scrolling
- Responsive design

## Security

✓ **Passwords hashed with bcrypt** using `password_hash()` and `password_verify()`

Still needed for production:

- Use prepared statements to prevent SQL injection
- Add CSRF token validation
- Implement input sanitization
- Use HTTPS for all connections
