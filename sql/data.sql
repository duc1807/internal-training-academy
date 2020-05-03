--
-- Database: `appdev`
--

-- INITIALISED DATA FOR THE SYSTEM

INSERT INTO `appdev`.`user_role` (`id`, `name`) VALUES
('1', 'Admin'),
('2', 'Training Staff'),
('3', 'Trainer'),
('4', 'Trainee');

INSERT INTO `department` (`id`, `name`, `location`) VALUES
(1, 'Finance', 'Hanoi'),
(2, 'H.R.', 'Hanoi'),
(3, 'Marketing', 'Hanoi'),
(4, 'Engineer', 'Hanoi');

INSERT INTO `appdev`.`course_category` (`id`, `name`, `description`) VALUES
('1', 'Programming', 'Including topics such as Web Development, Database Administration, etc.'),
('2', 'Business', 'Including finance and business topics');

INSERT INTO `appdev`.`course_topic` (`id`, `category_id`, `name`, `description`) VALUES
('1', '1', 'Web Development', NULL),
('2', '1', 'Computer Networking', NULL),
('3', '2', 'Management', NULL),
('4', '2', 'Marketing', NULL);

INSERT INTO `appdev`.`system_user` (`id`, `user_role_id`, `username`, `password`) VALUES
('1', '1', 'root', 'admingate'),
('2', '2', 'root_staff', 'staffgate');
