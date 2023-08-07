CREATE TABLE IF NOT EXISTS `#__displays_items` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`body` TEXT NOT NULL ,
`catid` TEXT NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
`access` TINYINT(1)  NOT NULL DEFAULT '1',
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;