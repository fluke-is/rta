CREATE TABLE `tbl_Member` (
  `member_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `training_id` int NOT NULL,
  `company_id` int NOT NULL,
  `national_id` int(13) NOT NULL,
  `blood_id` int(5) NOT NULL,
  `created` timestamp,
  `update` timestamp
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tbl_Training` (
  `training_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `training_unit` varchar(100),
  `created` timestamp,
  `update` timestamp
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tbl_Blood` (
  `blood_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `blood_type` varchar(10),
  `created` timestamp,
  `update` timestamp
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tbl_Company` (
  `company_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100),
  `created` timestamp,
  `update` timestamp
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tbl_Member` ADD FOREIGN KEY (`training_id`) REFERENCES `tbl_Training` (`training_id`);

ALTER TABLE `tbl_Member` ADD FOREIGN KEY (`company_id`) REFERENCES `tbl_Company` (`company_id`);

ALTER TABLE `tbl_Member` ADD FOREIGN KEY (`blood_id`) REFERENCES `tbl_Blood` (`blood_id`);

