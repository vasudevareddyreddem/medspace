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


  
  
  ALTER TABLE `medspace`.`cover_invoice_list`   
  ADD COLUMN `yellow` VARCHAR(250) NULL AFTER `pwd`,
  ADD COLUMN `yellowc` VARCHAR(250) NULL AFTER `yellow`,
  ADD COLUMN `blue` VARCHAR(250) NULL AFTER `yellowc`,
  ADD COLUMN `red` VARCHAR(250) NULL AFTER `blue`,
  ADD COLUMN `white` VARCHAR(250) NULL AFTER `red`;

  ALTER TABLE `medspace`.`cover_invoice_list`   
  CHANGE `yellow` `yellow` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci DEFAULT '0'   NULL,
  CHANGE `yellowc` `yellowc` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci DEFAULT '0'   NULL,
  CHANGE `blue` `blue` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci DEFAULT '0'   NULL,
  CHANGE `red` `red` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci DEFAULT '0'   NULL,
  CHANGE `white` `white` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci DEFAULT '0'   NULL;
