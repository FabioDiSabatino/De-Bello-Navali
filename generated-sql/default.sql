
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ShipDescription
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ShipDescription`;

CREATE TABLE `ShipDescription`
(
    `civilization` VARCHAR(30) NOT NULL,
    `dimension` INTEGER NOT NULL,
    `shipname` VARCHAR(30) NOT NULL,
    `shipweight` INTEGER NOT NULL,
    `weapon1` VARCHAR(30),
    `weapon2` VARCHAR(30),
    `weapon3` VARCHAR(30),
    PRIMARY KEY (`civilization`,`dimension`),
    INDEX `ShipDescription_fi_3af536` (`weapon1`),
    INDEX `ShipDescription_fi_c613df` (`weapon2`),
    INDEX `ShipDescription_fi_e1fa70` (`weapon3`),
    CONSTRAINT `ShipDescription_fk_3af536`
        FOREIGN KEY (`weapon1`)
        REFERENCES `weapondescription` (`weaponName`),
    CONSTRAINT `ShipDescription_fk_c613df`
        FOREIGN KEY (`weapon2`)
        REFERENCES `weapondescription` (`weaponName`),
    CONSTRAINT `ShipDescription_fk_e1fa70`
        FOREIGN KEY (`weapon3`)
        REFERENCES `weapondescription` (`weaponName`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- weapondescription
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `weapondescription`;

CREATE TABLE `weapondescription`
(
    `weaponName` VARCHAR(30) NOT NULL,
    `rangeName` VARCHAR(30) NOT NULL,
    `ammo` INTEGER NOT NULL,
    `reloadtime` INTEGER NOT NULL,
    PRIMARY KEY (`weaponName`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
