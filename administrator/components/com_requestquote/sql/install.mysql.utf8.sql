CREATE TABLE IF NOT EXISTS `#__requestquote_items` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL,
`emailto` VARCHAR(255)  NOT NULL,
`body` TEXT NOT NULL ,
`thankyou` TEXT NOT NULL ,
`metadesc` TEXT NOT NULL ,
`metakeys` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

