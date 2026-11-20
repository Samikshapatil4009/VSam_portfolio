CREATE DATABASE IF NOT EXISTS freelance_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE freelance_portfolio;

CREATE TABLE admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(60) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE services (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(150) NOT NULL,
 description TEXT NOT NULL,
 icon VARCHAR(20) DEFAULT '✦',
 sort_order INT DEFAULT 0,
 is_active TINYINT(1) DEFAULT 1
);
CREATE TABLE projects (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(150) NOT NULL,
 project_type VARCHAR(80) DEFAULT 'Web Development',
 description TEXT NOT NULL,
 technologies VARCHAR(255) NOT NULL,
 image VARCHAR(255) DEFAULT NULL,
 demo_url VARCHAR(255) DEFAULT NULL,
 is_published TINYINT(1) DEFAULT 0,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE pricing_plans (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 price VARCHAR(50) NOT NULL,
 price_note VARCHAR(80) DEFAULT 'starting',
 description VARCHAR(255) NOT NULL,
 features TEXT NOT NULL,
 sort_order INT DEFAULT 0,
 is_active TINYINT(1) DEFAULT 1
);
CREATE TABLE enquiries (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(150) NOT NULL,
 phone VARCHAR(25) DEFAULT NULL,
 service VARCHAR(150) DEFAULT NULL,
 requirements TEXT NOT NULL,
 status ENUM('New','Contacted','Closed') DEFAULT 'New',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO services (title,description,icon,sort_order) VALUES
('Business Website Development','Professional websites that explain your offer and build customer trust.','▣',1),
('E-commerce Website Development','Online stores with product catalogues, cart and checkout workflows.','◇',2),
('Portfolio Website Development','Personal and professional portfolios that make your work stand out.','✧',3),
('Landing Page Development','Focused landing pages for campaigns, products and lead generation.','↗',4),
('College & Educational Websites','Structured websites for institutes, courses and student information.','⌂',5),
('Hotel & Restaurant Websites','Elegant hospitality websites with menus, galleries and enquiry flows.','✦',6),
('PHP & MySQL Backend Development','Database-driven features, admin panels and custom PHP workflows.','⌘',7),
('Website Redesign & Maintenance','Refresh, improve and maintain an existing website.','⟳',8);

INSERT INTO projects (title,project_type,description,technologies,is_published) VALUES
('E-commerce Website Concept','E-commerce','A sample online store concept. Replace this entry with your own verified project details and screenshots.','PHP, MySQL, HTML, CSS',0),
('College Website','Education','A multi-page college website project. Add a real screenshot and working demo when ready.','HTML, CSS, Bootstrap',0),
('Placement Portal','Web Application','A student placement portal concept with role-based workflows. Publish only when your build is ready to show.','PHP, MySQL, JavaScript',0),
('Drug Inventory Management','Web Application','An academic project concept for inventory and supply-chain tracking.','PHP, MySQL, HTML, CSS',0),
('Hotel Website','Hospitality','A hospitality website concept with room or service information and enquiry flow.','HTML, CSS, JavaScript',0);

INSERT INTO pricing_plans (name,price,price_note,description,features,sort_order) VALUES
('Basic Website','₹4,999','starting price','A clean online presence for a personal brand or small business.','Up to 5 pages\nResponsive design\nContact form\nBasic on-page SEO\nSocial media links',1),
('Business Website','₹9,999','starting price','A polished website for growing businesses that need more flexibility.','Up to 10 pages\nCustom design sections\nPHP contact form\nAdmin-managed content (as scoped)\nBasic SEO setup\nGoogle Maps embed',2),
('E-commerce Website','₹19,999','starting price','A product-selling website with a practical store foundation.','Product catalogue\nCart and checkout flow\nMySQL database\nAdmin product management\nPayment gateway integration (provider fees extra)\nOrder enquiry workflow',3);

-- Create an admin account after importing this file:
-- Run: php -r "echo password_hash('ChangeThisPassword!', PASSWORD_DEFAULT);"
-- Then insert the generated hash:
-- INSERT INTO admins (username,password_hash) VALUES ('admin','PASTE_HASH_HERE');
