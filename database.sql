-- Travel Database Schema
-- Database: if0_40699598_aether_elegance
-- This script creates all required tables for the Travel application
--
-- IMPORTANT: For InfinityFree, the database is already created.
-- Before running this script in phpMyAdmin:
-- 1. Select your database: if0_40699598_aether_elegance
-- 2. Click on the "SQL" tab
-- 3. Paste and execute this entire script
--
-- Note: Do not include CREATE DATABASE or USE statements as the database already exists

-- ============================================
-- Table: users
-- Stores user account information
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: destinations
-- Stores travel destination information
-- ============================================
CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    cost VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Table: favourites
-- Stores user's favorite destinations (junction table with denormalized data)
-- ============================================
CREATE TABLE IF NOT EXISTS favourites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dest_id INT NOT NULL,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    cost VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (dest_id) REFERENCES destinations(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_destination (user_id, dest_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- Sample Data (Optional - for testing)
-- ============================================

-- Sample destinations
INSERT INTO destinations (name, location, cost) VALUES
('Tropical Paradise', 'Maldives', '$1,200'),
('Mountain Adventure', 'Switzerland', '$2,500'),
('Cultural Heritage', 'Japan', '$1,800'),
('Beach Escape', 'Bali, Indonesia', '$900'),
('City Lights', 'New York, USA', '$2,200'),
('Desert Safari', 'Dubai, UAE', '$1,500'),
('European Tour', 'Paris, France', '$1,600'),
('Nature Retreat', 'New Zealand', '$2,800'),
('Historic Journey', 'Rome, Italy', '$1,400'),
('Exotic Islands', 'Thailand', '$1,100')
ON DUPLICATE KEY UPDATE name=name;

-- ============================================
-- Indexes for better performance
-- ============================================
CREATE INDEX idx_users_username ON users(username);
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_favourites_user_id ON favourites(user_id);
CREATE INDEX idx_favourites_dest_id ON favourites(dest_id);
