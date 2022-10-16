DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
                               `id` int(11) NOT NULL AUTO_INCREMENT,
                               `username` varchar(50) DEFAULT NULL,
                               `lastname` varchar(100) DEFAULT NULL,
                               `firstname` varchar(100) DEFAULT NULL,
                               `password` varchar(255) DEFAULT NULL,
                               PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `messagerie` (
                              `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                              `username` varchar(50) NOT NULL,
                              `message` text NOT NULL
) AUTO_INCREMENT=0;