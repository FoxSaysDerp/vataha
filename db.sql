CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
); 

CREATE  TABLE  files_info (
post_id int auto_increment primary key,
name varchar(50),
type varchar(30) null,
size int not null,
description varchar(100) null,
username VARCHAR(50) );