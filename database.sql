-- 1. Create the Database
CREATE DATABASE IF NOT EXISTS clinic_db;
USE clinic_db;

-- 2. Create Users Table (for login/register)
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- 3. Create Appointments Table
CREATE TABLE IF NOT EXISTS appointments (
    app_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    doctor_name VARCHAR(100) NOT NULL,
    app_date DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    status VARCHAR(20) DEFAULT 'Confirmed'
);