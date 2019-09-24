ALTER TABLE `medspace`.`hospital_waste`   
  ADD COLUMN `infected_c_waste_kgs` VARCHAR(250) NULL AFTER `infected_waste_qty`,
  ADD COLUMN `infected_c_waste_qty` VARCHAR(250) NULL AFTER `infected_c_waste_kgs`;

  ALTER TABLE `medspace`.`hospital_waste`   
  ADD COLUMN `bio_infected_c_waste_kgs` VARCHAR(250) NULL AFTER `bio_infected_waste_qty`,
  ADD COLUMN `bio_infected_c_waste_qty` VARCHAR(250) NULL AFTER `bio_infected_c_waste_kgs`;
