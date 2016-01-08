CREATE TABLE IF NOT EXISTS `articulos` (
  `codArt` int NOT NULL AUTO_INCREMENT,
  `desArt` varchar(60) NOT NULL,
  `preComArt` float NOT NULL,
  `preVenArt` float NOT NULL,
  `stoArt`int NOT NULL, 
  PRIMARY KEY (`codArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


INSERT INTO `articulos` (`desArt`, `preComArt`, `preVenArt`, `stoArt`) VALUES 
('Tornillos Autorroscante', 0.5, 1.2, 6), 
('Tuercas La Pera', 0.9, 3.4, 20), 
('Varilla Roscada', 1.5, 8.9, 45), 
('Cuerdas dinámica', 3.8, 10, 15)
