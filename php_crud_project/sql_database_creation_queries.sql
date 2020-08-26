--I created a local server and a database using xampp control panel.:

--These were the SQl queries for the creation of database - crud and the table - products_info.:


CREATE DATABASE crud;

-- Inside crud

CREATE TABLE products_info (
    id int(11) NOT NULL AUTO_INCREMENT ,
    product_name varchar(255) ,
    product_type varchar(255),
    product_company varchar(255),
    price int(255) , 
	PRIMARY KEY (id)
);


