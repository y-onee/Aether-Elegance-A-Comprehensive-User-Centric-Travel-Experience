<?php
/**
 * Database Configuration File Template
 * 
 * Copy this file to config.php and update with your actual database credentials
 * NEVER commit config.php to version control (it's in .gitignore)
 */

// InfinityFree Database Configuration
// InfinityFree requires the SQL host name for database connections
define('DB_HOST', 'sql302.infinityfree.com');        // Your SQL host
define('DB_USER', 'your_username');                  // Your database username
define('DB_PASS', 'your_password');                  // Your database password
define('DB_NAME', 'your_database_name');             // Your database name

/**
 * Database Connection Function
 * Use this function in your PHP files to connect to the database
 */
function getDBConnection() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;
}

/**
 * Database Connection using mysqli object-oriented style
 */
function getDBConnectionObject() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
?>
