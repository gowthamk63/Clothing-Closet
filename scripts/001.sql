ALTER TABLE `person` CHANGE `name` `name` VARCHAR(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE login ADD email VARCHAR(60) AFTER id;
ALTER TABLE `login` CHANGE `id` `id` INT(20) NOT NULL AUTO_INCREMENT;
alter table role add role_code int(3) after id;
ALTER TABLE `role` CHANGE `role_code` `role_code` INT(3) NULL DEFAULT '0';
ALTER TABLE `person` CHANGE `state` `state` VARCHAR(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
