CREATE DATABASE chakri_sathi;

USE chakri_sathi;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_type ENUM('Employer', 'Job Seeker') NOT NULL,
  name VARCHAR(100),
  phone VARCHAR(20),
  email VARCHAR(100) UNIQUE,
  education VARCHAR(255),
  password VARCHAR(255)
);

--- part 2
CREATE TABLE jobs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100),
  company VARCHAR(100),
  location VARCHAR(100),
  category VARCHAR(100),
  posted_date DATE
);

-- Sample data
INSERT INTO jobs (title, company, location, category, posted_date) VALUES
('Frontend Developer', 'TechHive', 'Dhaka', 'IT', CURDATE()),
('Sales Executive', 'ABC Corp', 'Chittagong', 'Sales', CURDATE()),
('HR Assistant', 'HRPro Ltd.', 'Sylhet', 'HR', CURDATE());

--part 3
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  caption TEXT,
  photo VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE users ADD last_login DATETIME;
