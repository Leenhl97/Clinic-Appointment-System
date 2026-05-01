🩺 Clinic Appointment System
A web-based platform for managing medical appointments, allowing patients to browse doctors and book visits digitally. Built using the LAMP stack (Windows version: XAMPP).

🚀 How to Run the Project
Follow these steps to get the website running on your local machine:

1. Prerequisites
Install XAMPP (or any local server like WAMP or MAMP).

A web browser (Chrome, Edge, etc.).

2. Project Setup
Copy Files: Copy the entire project folder (Clinic Appointment System) and paste it into the XAMPP root directory:
C:\xampp\htdocs\

Start Services: Open the XAMPP Control Panel and start both Apache and MySQL.

3. Database Configuration
Open your browser and go to: http://localhost/phpmyadmin/

Create a new database named clinic_db.

Click on the Import tab.

Select the database.sql file (provided in the project folder) and click Go to create the tables.

4. Database Connection
Ensure the file db_connect.php contains the correct credentials:

PHP
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "clinic_db";
5. Access the Website
Open your browser and enter the following URL:
http://localhost/Clinic%20Appointment%20System/index.php

🛠️ Technologies Used
Frontend: HTML5, CSS3, JavaScript.

Backend: PHP.

Database: MySQL.