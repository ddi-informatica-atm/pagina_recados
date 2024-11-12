
#Para Este Projeto funcionar

você vai precisar de um banco de dados rodando no seu sistema com nome pagina_recados e duas tabelas chamadas usuário e recados.
Projeto onde uma pessoa loga no sistema e publica recados e ela pode ver os recados das outras pessoas postado.
banco de dados pagina_recados
tabela recados
CREATE TABLE `recados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `recado` varchar(200) NOT NULL,
  `data_hora_recado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3


tabela usuario
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` char(14) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_hora_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3
