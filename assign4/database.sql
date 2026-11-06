CREATE DATABASE php_assignment;

USE php_assignment;

CREATE TABLE ajax_students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
/*Stop-Service -Name MySQL267 */