-- alisha add column
ALTER TABLE `user_leads` ADD `amount` INT NULL DEFAULT NULL AFTER `comment`;
-- Add users column
ALTER TABLE `users` ADD `address` VARCHAR(255) NULL DEFAULT NULL AFTER `email`;
ALTER TABLE `users` ADD `image` VARCHAR(255) NULL DEFAULT NULL AFTER `address`;