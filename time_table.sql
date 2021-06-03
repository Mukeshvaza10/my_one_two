CREATE TABLE IF NOT EXISTS `generate_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `working_day` int(11) NULL DEFAULT NULL,
  `working_hours` int(11) NULL DEFAULT NULL,
  `total_subject` int(11) NULL DEFAULT NULL,
  `num_sub_per_day` int(11) NULL DEFAULT NULL,
  `total_hours_for_week` varchar(150) NULL DEFAULT NULL,
  `time_table` text NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1