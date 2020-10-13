mysql> show create table courses;
--------------------------------------------------------------------------------------------+
| courses | CREATE TABLE `courses` (
  `school_code` enum('L','B','A','F','E','T','I','W','S','U','M') NOT NULL,
  `dept_id` tinyint(3) unsigned NOT NULL,
  `course_code` char(5) NOT NULL DEFAULT 'NULL',
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`dept_id`,`course_code`),
  KEY `school_code` (`school_code`,`dept_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`school_code`, `dept_id`) REFERENCES `departments` (`school_code`, `dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |
+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)
