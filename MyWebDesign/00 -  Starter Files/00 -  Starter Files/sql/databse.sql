CREATE TABLE `integrated-database-n00241978`.`stories` 
(
    `id` INT NOT NULL , 
    `headline` TEXT NOT NULL , 
    `short_headline` TEXT, 
    `article` TEXT NOT NULL , 
    `img_url` TEXT NOT NULL , 
    `author_id` INT NOT NULL , 
    `catagory_id` INT NOT NULL , 
    `location_id` INT NOT NULL , 
    `created_at` DATETIME NOT NULL , 
    `updated_at` DATETIME NOT NULL 
);

INSERT INTO `stories`(`id`, `headline`, `short headline`, `article`, `img_url`, `author_id`, `catagory_id`, `location_id`, `date`, `updated`) 
VALUES 
('1','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]'),

CREATE TABLE `integrated-database-n00241978`.`locations` 
(
    `location_id` INT NOT NULL , 
    `location_name` TEXT NOT NULL 
);

INSERT INTO `locations`(`location_id`, `location_name`) 
VALUES 
('1','Ireland'),
('2','Thailand'),
('3','USA'),
('4','France'),
('5','Palistine'),
('6','Korea'),
('7','UK'),
('8','Europe');

CREATE TABLE `integrated-database-n00241978`.`catagories` 
(
    `catagory_id` INT NOT NULL , 
    `catagory_name` TEXT NOT NULL 
);

INSERT INTO `catagories`(`catagory_id`, `catagory_name`) 
VALUES 
('1','News'),
('2','Buisness'),
('3','Art and Design'),
('4','World'),
('5','Enviornment'),
('6','Tech');

CREATE TABLE `integrated-database-n00241978`.`authors` 
(
    `author_id` INT NOT NULL , 
    `firstname` TEXT NOT NULL , 
    `lastname` TEXT NOT NULL 
);



INSERT INTO `authors`(`author_id`, `firstname`, `lastname`) 
VALUES 
('1','Conor','Macolouy'),
('2','River','Akira'),
('3','Jillian','Stein'),
('4','Matt','Stephens'),
('5','Joe','Coscarelli'),
('6','Chantel','Tattoli'),
('7','Alexandra','Alter'),
('8','Fergal','Gallagher'),
('9','Zachary','Small'),
('10','Barry','O Rourke'),
('11','John','Smith'),
('12','Hugh','Schofield'),
('13','River','Akira'),
('14','Christopher','J Preston'),
('15','Zoe','Kleinman'),
('16','Deborah','Nicholls-Lee'),
('17','Devon','Van Houten Maldonado'),
('18','James','Waterhouse'),
('19','Annie','Correal'),
('20','Lucy','Hooker'),
('21','Cherylann','Mollan');
