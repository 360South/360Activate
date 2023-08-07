CREATE TABLE IF NOT EXISTS `#__broswer_items` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL DEFAULT 'Zepel Fabrics: Contact Us',
`emailto` VARCHAR(255)  NOT NULL DEFAULT 'sayhello@zepelfabrics.com',
`body` VARCHAR(255)  NOT NULL ,
`thankyou` VARCHAR(255)  NOT NULL ,
`metadesc` TEXT NOT NULL ,
`metakeys` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

