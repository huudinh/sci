CREATE TABLE IF NOT EXISTS `api_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` varchar(100),
  `user_email` varchar(100),
  `user_phone` int(11),
  `user_age` date,
  `user_city` varchar(100),
  `user_photo` varchar(100),
  `display_name` varchar(100),
  `user_note` varchar(255),
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;


INSERT INTO `api_users` (`id`, `user_login`, `user_pass`, `user_role`, `user_email`, `user_phone`, `user_age`, `user_city`, `user_photo`, `display_name`, `user_note`, `created`) VALUES 
(1, 'admin', '1', 'admin', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(2, 'user1', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(3, 'user2', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(4, 'user3', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(5, 'user4', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(6, 'user5', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(7, 'user6', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(8, 'user7', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(9, 'user8', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30'),
(10, 'user9', '1', 'member', 'johndoe@gmail.com', 0887623038, '2012-06-01', 'Hà Nội', 'https://facebook.com/huudinh85/', 'Triệu Hữu Định', 'Làm trai phải lạ ở trên đời', '2012-06-01 02:12:30');
