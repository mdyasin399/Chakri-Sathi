-- Create database
CREATE DATABASE IF NOT EXISTS chakri_sathi;
USE chakri_sathi;

-- Table: users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_type ENUM('Employer', 'Job Seeker') NOT NULL,
  name VARCHAR(100),
  phone VARCHAR(20),
  email VARCHAR(100) UNIQUE,
  education VARCHAR(255),
  password VARCHAR(255),
  last_login DATETIME
) ENGINE=InnoDB;

-- Table: jobs
CREATE TABLE IF NOT EXISTS jobs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100),
  company VARCHAR(100),
  location VARCHAR(100),
  category VARCHAR(100),
  posted_date DATE
) ENGINE=InnoDB;

-- Sample job data
INSERT INTO jobs (title, company, location, category, posted_date) VALUES
('Frontend Developer', 'TechHive', 'Dhaka', 'IT', CURDATE()),
('Sales Executive', 'ABC Corp', 'Chittagong', 'Sales', CURDATE()),
('HR Assistant', 'HRPro Ltd.', 'Sylhet', 'HR', CURDATE());

-- Table: posts
CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  caption TEXT,
  photo VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;
