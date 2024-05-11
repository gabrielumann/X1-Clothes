CREATE DATABASE `db-x1-clothes`;

use `db-x1-clothes`;
CREATE TABLE Usuarios ( 
 ID_user INT AUTO_INCREMENT PRIMARY KEY,  
 name varchar(255),
 cpf char(11) ,
 password varchar(255),  
 email varchar(255),  
 role varchar(50),
 image varchar(255)
); 

CREATE TABLE Endereço 
( 
 ID_addrees INT AUTO_INCREMENT PRIMARY KEY,   
 addrees varchar(255),  
 cep char(8),  
 state varchar(255),  
 ID_user INT,
 FOREIGN KEY (ID_user) REFERENCES Usuarios(ID_user)
); 

CREATE TABLE Categorias 
( 
 ID_category INT AUTO_INCREMENT PRIMARY KEY,  
 name varchar(255)
); 

CREATE TABLE Produtos 
( 
 ID_products INT AUTO_INCREMENT PRIMARY KEY,  
 name varchar(255),  
 price double,  
 ID_category INT,  
 FOREIGN KEY (ID_category) REFERENCES Categorias(ID_category) 
); 

CREATE TABLE ImagemProdutos 
( 
 ID_image INT AUTO_INCREMENT PRIMARY KEY,  
 images varchar(255),  
 ID_products INT,  
 FOREIGN KEY (ID_products) REFERENCES Produtos(ID_products) 
); 


CREATE TABLE ItensPedidos 
( 
 ID_orderProducts INT AUTO_INCREMENT PRIMARY KEY,  
 quantity INT,  
 ID_products INT, 
 FOREIGN KEY (ID_products) REFERENCES Produtos(ID_products)
); 

CREATE TABLE Pedidos 
( 
  ID_order INT AUTO_INCREMENT PRIMARY KEY ,  
  orderDate  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,  
  ID_user INT, 
  FOREIGN KEY (ID_user) REFERENCES Usuarios(ID_user)
); 

CREATE TABLE Avaliação 
( 
 ID_rating INT AUTO_INCREMENT PRIMARY KEY,  
 comment varchar(255),  
 rating INT,  
 ID_user INT, 
 FOREIGN KEY (ID_user) REFERENCES Usuarios(ID_user)
); 


CREATE TABLE Faq 
( 
 id INT AUTO_INCREMENT PRIMARY KEY ,  
 id_type int,
 questions varchar(255),  
 answers varchar(1500)
); 

