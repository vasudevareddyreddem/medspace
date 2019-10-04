ALTER TABLE `medspace`.`hospital_waste`   
  ADD COLUMN `infected_c_waste_kgs` VARCHAR(250) NULL AFTER `infected_waste_qty`,
  ADD COLUMN `infected_c_waste_qty` VARCHAR(250) NULL AFTER `infected_c_waste_kgs`;

  ALTER TABLE `medspace`.`hospital_waste`   
  ADD COLUMN `bio_infected_c_waste_kgs` VARCHAR(250) NULL AFTER `bio_infected_waste_qty`,
  ADD COLUMN `bio_infected_c_waste_qty` VARCHAR(250) NULL AFTER `bio_infected_c_waste_kgs`;

  
  
  ALTER TABLE `medspace`.`hospital_waste`   
  ADD COLUMN `current_latitude` VARCHAR(250) NULL AFTER `current_address`,
  ADD COLUMN `current_longitude` VARCHAR(250) NULL AFTER `current_latitude`,
  ADD COLUMN `bio_current_latitude` VARCHAR(250) NULL AFTER `bio_current_address`,
  ADD COLUMN `bio_current_longitude` VARCHAR(250) NULL AFTER `bio_current_latitude`;
  
  
  
  
  
  ALTER TABLE `medspace`.`hospital_waste`   
  ADD COLUMN `email_sent` INT(11) DEFAULT 0  NULL AFTER `updated_time`;

