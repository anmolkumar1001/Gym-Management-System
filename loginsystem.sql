
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Table for Members Details

CREATE TABLE `Member` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `member_id` varchar(40) NOT NULL,
  `trainer_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert value in table Member

INSERT INTO `Member` (`fname`, `lname`, `email`, `member_id`, `trainer_id`) VALUES
('Sachin', 'Kumar', 'kumar@gmail.com', '201', '101'),
('Saurav', 'Kumar', 'kumar121@gmail.com', '202', '102'),
('Mukul', 'Kumar', 'raj1242gmail.com', '203', '101'),
('Ramesh', 'Kumar', 'ramesh@gmail.com', '204', '103'),
('Aditya', 'Sudhanshu', 'sudhanshu@gmail.com', '205', '103'),
('Kshitiz', 'Jha', 'jha@gmail.com', '206', '102'),
('Akash', 'Verma', 'verma12@gmail.com', '207', '103');

-- Table for Admin Details

CREATE TABLE `admin1` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert value in table admin1

INSERT INTO `admin1` (`username`, `password`) VALUES
('anmol123', '12345');

-- Table for Package Details

CREATE TABLE `Package` (
  `Package_id` varchar(40) NOT NULL,
  `Package_name` varchar(40) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Trainer_id` int(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert value in table Package

INSERT INTO `Package` (`Package_id`, `Package_name`, `Amount`,`Trainer_id`,`customer_id`) VALUES
('121', 'preliminary', 800, 101,'201'),
('122', 'Wt. gain', 1500, 102, '202'),
('123', 'Wt.loss', 1000, 103, '203');

-- Table for Payment Details

CREATE TABLE `Payment` (
  `Payment_id` int(10) NOT NULL,
  `Amount` int(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert value in table Payment

INSERT INTO `Payment` (`Payment_id`, `Amount`, `customer_id`, `payment_type`) VALUES
(301, 1500, '201', 'cash'),
(302, 800, '202', 'card'),
(303, 1000, '203', 'cheque'),
(304, 1500, '204', 'cash');

-- Table for Trainer Details

CREATE TABLE `Trainer` (
  `Trainer_id` int(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert value in table Trainer

INSERT INTO `Trainer` (`Trainer_id`, `Name`, `phone`) VALUES
(101, 'Ramesh', 9574352743),
(102, 'Mahesh', 7546932412),
(103, 'Akash', 7865933334),
(104, 'Abhishek', 9723434451);

-- Alter the table Member and add PRIMARY KEY as member_id

ALTER TABLE `Member`
  ADD PRIMARY KEY (`member_id`);

-- Alter the table Member and add PRIMARY KEY as Package_id

ALTER TABLE `Package`
  ADD PRIMARY KEY (`Package_id`);

-- Alter the table Member and add PRIMARY KEY as Paymenr_id

ALTER TABLE `Payment`
  ADD PRIMARY KEY (`Payment_id`);

-- Alter the table Member and add PRIMARY KEY as Trainer_id

ALTER TABLE `Trainer`
  ADD PRIMARY KEY (`Trainer_id`);
COMMIT;


-- Adding Trigger to store before deleted data of member

CREATE TRIGGER `member_before_delete` 
BEFORE DELETE ON `member`
FOR EACH ROW 
INSERT INTO member_backup SET fname = OLD.fname, lname = OLD.lname, 
email = OLD.email, member_id = OLD.member_id, trainer_id = OLD.trainer_id

-- Adding Trigger to store before updated data of member

CREATE TRIGGER `member_before_update` BEFORE UPDATE ON `member`
FOR EACH ROW INSERT INTO member_backup SET fname = OLD.fname, lname = OLD.lname, 
email = OLD.email, member_id = OLD.member_id, trainer_id = OLD.trainer_id

-- Adding Procedure to get all members which have same trainer_id

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllMembers`()
BEGIN
    DECLARE fname VARCHAR(40);
    DECLARE lname VARCHAR(40);
    DECLARE trainerId VARCHAR(60);
    DECLARE exit_loop BOOLEAN DEFAULT FALSE;
    DECLARE members_cursor CURSOR FOR SELECT fname,lname,trainer_id FROM member; 
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;
    OPEN members_cursor;
    members_loop: LOOP
          FETCH FROM members_cursor INTO fname,lname,trainerId;
          IF exit_loop THEN
             LEAVE members_loop;
          END IF;
          IF trainerId = "101" THEN
          SELECT fname,lname;
          END IF;
    END LOOP members_loop;
    CLOSE members_cursor;
END$$
DELIMITER ;