DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
GRANT ALL PRIVILEGES ON dolphin_crm.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';
USE dolphin_crm;

-- USERS TABLE
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
    `id` integer(15) NOT NULL auto_increment,
    `firstname` varchar(35) NOT NULL default '',
    `lastname` varchar(35) NOT NULL default '',
    `password` varchar(35) NOT NULL default '',
    `email` varchar(35) NOT NULL default '',
    `role` varchar(20) NOT NULL default '',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);

INSERT INTO `Users` VALUES(1,'','',HASHBYTES('SHA1','password123'),'admin@project2.com','',CURRENT_TIMESTAMP),
                        


-- CONTACTS TABLE
DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts` (
    `id` integer(15) NOT NULL auto_increment,
    `title` varchar(35) NOT NULL default '',
    `firstname` varchar(35) NOT NULL default '',
    `lastname` varchar(35) NOT NULL default '',
    `email` varchar(35) NOT NULL default '',
    `telephone` varchar(20) NOT NULL default '',
    `company` varchar(20) NOT NULL default '',
    `type` varchar(20) NOT NULL default '',
    `assigned_to` integer(15) NOT NULL default '0',
    `created_by` integer(15) NOT NULL default '0',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

-- NOTES TABLE
DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes` (
    `id` integer(15) NOT NULL auto_increment,
    `contact_id` integer(35) NOT NULL default '',
    `comment` text NOT NULL default '',
    `created_by` integer(15) NOT NULL default '0',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);