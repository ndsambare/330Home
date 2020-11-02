mysql> show create table departments;
| departments | CREATE TABLE `departments` (
  `school_code` enum('L','B','A','F','E','T','I','W','S','U','M') NOT NULL DEFAULT 'L',
  `dept_id` tinyint(3) unsigned NOT NULL,
  `abbreviation` varchar(9) NOT NULL,
  `dept_name` varchar(200) NOT NULL,
  PRIMARY KEY (`school_code`,`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 |
+-------------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)
