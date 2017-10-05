----------------
CREATE TABLE IF NOT EXISTS `employee_tbl` (
  `id` int(3) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `id_dept` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `employee_tbl` (`id`, `name`, `id_dept`) VALUES
(1, 'Andrei', 1),
(2, 'Max', 2),
(3, 'John', 1),
(4, 'Ben', 3);
----------------

----------------
CREATE TABLE IF NOT EXISTS `department_tbl` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

INSERT INTO `department_tbl` (`id`, `name`) VALUES
(1, 'Development'),
(2, 'Consulting'),
(3, 'Research'),
(4, 'Booking');
----------------
