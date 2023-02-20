drop database if exists dua_db;
create database dua_db;
use dua_db;




create table Role(
   role_id int(11) primary key AUTO_INCREMENT,
   role_name varchar(50) not null
);


insert into `Role`(`role_id`, `role_name`) values(0, 'admin');
insert into `Role`(`role_id`, `role_name`) values(1, 'logged-in-user');


create table User(
   user_id int AUTO_INCREMENT,
   username varchar(50),
   email varchar(80),
   pword varchar(100),
   phone_number varchar(15),
   role_id int,


   foreign key(role_id) references Status(role_id)
);


insert into `User`(`username`, `email`, `pword`, `phone_number`, `role_id`) VALUES ("admin_omar", "omar@dua.com", "123", "+12334",0);
insert into `User`(`username`, `email`, `pword`, `phone_number`, `role_id`) VALUES ("admin_dade", "dade@dua.com", "123", "+12334",0);
insert into `User`(`username`, `email`, `pword`, `phone_number`, `role_id`) VALUES ("admin_senam", "senam@dua.com", "123", "+12334",0);
insert into `User`(`username`, `email`, `pword`, `phone_number`, `role_id`) VALUES ("admin_selom", "selom@dua.com", "123", "+12334",0);




create table Category(
   category_id int PRIMARY KEY AUTO_INCREMENT,
   category_name varchar(50) not null
);


insert into `Category`(`category_id`, `category_name`) values (1, 'potted plants');
insert into `Category`(`category_id`, `category_name`) values (2, 'bouquets');




create table Product(
   product_id int PRIMARY KEY auto_increment,
   category_id int,
   product_name varchar(255) not null,
   price double not null,
   weight varchar(20) not null,
   picture_path varchar(255) not null,


   foreign key (category_id) references Category(category_id)
);


# insert potted plants
INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (1,'Fruit of Accra',240.00,'5kg','/dua_database/Assets/Potted Plants/succulent.jpg');


INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (1,'Green Oheneba',240.00,'5kg','/dua_database/Assets/Potted Plants/potted plant short.png');


INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (1,"Senam's Disguise",240.00,'5kg','/dua_database/Assets/Potted Plants/otherpotted.png');


INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (1,'Fleur La Vie',240.00,'5kg','/dua_database/Assets/Potted Plants/long pot.png');


INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (1,"Caleb's Lily",240.00,'5kg','/dua_database/Assets/Potted Plants/otherpotted.png');




# insert bouquets
INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (2,"Caleb's Lily's",240.00,'1kg','/dua_database/Assets/Bouquets/lily of the valley.png');


INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (2,"Senam's Disguises",240.00,'1kg','/dua_database/Assets/Bouquets/tulip purple.png');


INSERT INTO `Product`(`category_id`, `product_name`, `price`, `weight`, `picture_path`) VALUES (2,'Opuntia Crowd',240.00,'1kg','/dua_database/Assets/Bouquets/bouquet brown.png');




create table Cart(
   product_id int,
   ip_address varchar(50),
   user_id int,
   quantity int,


   foreign key (product_id) references Product(product_id)
);


create table Payment(
   payment_id int PRIMARY KEY AUTO_INCREMENT,
   user_id int,
   FOREIGN KEY(user_id) REFERENCES User(user_id),
   amount double
);


create table Orders(
   order_id int PRIMARY KEY AUTO_INCREMENT,
   user_id int,
   FOREIGN KEY(user_id) REFERENCES User(user_id),
   payment_id int,
   FOREIGN KEY(payment_id) REFERENCES Payment(payment_id),
   order_date DATE
);
