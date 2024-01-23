-- alisha add column
ALTER TABLE `user_leads` ADD `amount` INT NULL DEFAULT NULL AFTER `comment`;
-- Add users column
ALTER TABLE `users` ADD `address` VARCHAR(255) NULL DEFAULT NULL AFTER `email`;
ALTER TABLE `users` ADD `image` VARCHAR(255) NULL DEFAULT NULL AFTER `address`;
ALTER TABLE `product` CHANGE `Amount` `amount` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;