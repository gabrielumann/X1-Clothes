CREATE DATABASE `db-x1-clothes`;

use `db-x1-clothes`;

CREATE TABLE users ( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
 name varchar(255) NOT NULL,
 cpf char(11) NOT NULL,
 password varchar(255) NOT NULL,  
 email varchar(255) NOT NULL,  
 role varchar(50) NOT NULL,
 image varchar(255)
); 


CREATE TABLE addresses
( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,   
 address varchar(255) NOT NULL,  
 cep char(8) NOT NULL,  
 state varchar(255) NOT NULL,  
 user_id INT NOT NULL,
 FOREIGN KEY (user_id) REFERENCES users(id)
); 

CREATE TABLE categories 
( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
 name varchar(255) NOT NULL
); 

CREATE TABLE products 
( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
 name varchar(255) NOT NULL,  
 price double NOT NULL,  
 category_id INT NOT NULL,  
 FOREIGN KEY (category_id) REFERENCES categories(id) 
); 

CREATE TABLE product_images 
( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
 images varchar(255) NOT NULL,  
 product_id INT NOT NULL,  
 FOREIGN KEY (product_id) REFERENCES products(id) 
); 


CREATE TABLE order_items 
( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
 quantity INT NOT NULL,  
 product_id INT NOT NULL, 
 FOREIGN KEY (product_id) REFERENCES products(id) 
); 

CREATE TABLE orders 
( 
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,  
  order_date  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,  
  user_id INT NOT NULL, 
  FOREIGN KEY (user_id) REFERENCES users(id)
); 

CREATE TABLE rating 
( 
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
 text varchar(255),  
 rating INT NOT NULL,  
 user_id INT NOT NULL, 
 FOREIGN KEY (user_id) REFERENCES users(id)
); 


CREATE TABLE faq_questions 
(
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  question varchar(255) NOT NULL,
  answer text NOT NULL,
  type_id int NOT NULL,
  FOREIGN KEY (type_id) REFERENCES faq_types(`id`)
);


CREATE TABLE faq_types 
(
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255) NOT NULL
) ;



