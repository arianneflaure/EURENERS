ALTER TABLE `menus` ADD `link` VARCHAR( 200 ) NOT NULL AFTER `descripcion`;
ALTER TABLE `menus` ADD `parent` INT NULL AFTER `descripcion` ;
ALTER TABLE `menus` ADD `order` INT NOT NULL AFTER `parent` ,
ADD `level` INT NOT NULL AFTER `order` ;
