# Host: localhost  (Version 5.7.17-log)
# Date: 2019-01-25 22:02:14
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "contas"
#

DROP TABLE IF EXISTS `contas`;
CREATE TABLE `contas` (
  `c_id` int(4) NOT NULL AUTO_INCREMENT,
  `c_usuario` varchar(15) NOT NULL,
  `c_senha` text NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_apelido` varchar(25) NOT NULL,
  `c_status` tinyint(1) NOT NULL,
  `c_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `c_cash` int(4) NOT NULL DEFAULT '0',
  `c_data_cadastro` int(4) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "contas"
#

/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` VALUES (1,'admin','','','',0,0,1400,0),(2,'filipi2012','','','',0,0,100,0);
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

#
# Structure for table "premiun_nell_buylog"
#

DROP TABLE IF EXISTS `premiun_nell_buylog`;
CREATE TABLE `premiun_nell_buylog` (
  `log_id` int(4) NOT NULL AUTO_INCREMENT,
  `log_type` tinyint(1) NOT NULL,
  `log_client_name` varchar(25) NOT NULL,
  `log_msg` text NOT NULL,
  `log_date` int(4) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

#
# Data for table "premiun_nell_buylog"
#

/*!40000 ALTER TABLE `premiun_nell_buylog` DISABLE KEYS */;
INSERT INTO `premiun_nell_buylog` VALUES (1,1,'ADMIN','Buy item: 0 0 0 0 0 0 0',1548358104),(2,1,'ADMIN','Buy item: 0 0 0 0 0 0 0',1548359205),(3,1,'ADMIN','Buy item: 788 0 0 0 0 0 0',1548359862),(4,1,'ADMIN','Buy item: 789 0 0 0 0 0 0',1548360224),(5,1,'ADMIN','Buy item: 790 0 0 0 0 0 0',1548360471),(6,1,'ADMIN','Buy item: 791 0 0 0 0 0 0',1548360475),(7,1,'ADMIN','Buy item: 792 0 0 0 0 0 0',1548360556),(8,1,'ADMIN','Buy item: 788 0 0 0 0 0 0',1548361014),(9,1,'ADMIN','Buy item: 789 0 0 0 0 0 0',1548361031),(10,1,'ADMIN','Buy item: 790 0 0 0 0 0 0',1548361041),(11,1,'ADMIN','Buy item: 791 0 0 0 0 0 0',1548361045),(12,1,'ADMIN','Buy item: 792 0 0 0 0 0 0',1548361049),(13,1,'ADMIN','Buy item: 793 0 0 0 0 0 0',1548361053),(14,1,'ADMIN','Buy item: 794 0 0 0 0 0 0',1548361057),(15,1,'ADMIN','Buy item: 795 0 0 0 0 0 0',1548361060),(16,1,'ADMIN','Buy item: 796 0 0 0 0 0 0',1548361065),(17,1,'ADMIN','Buy item: 797 0 0 0 0 0 0',1548361070),(18,1,'ADMIN','Buy item: 3417 61 5 0 0 0 0',1548361628),(19,1,'ADMIN','Buy item: 3346 0 0 0 0 0 0',1548363411),(20,1,'ADMIN','Buy item: 3346 0 0 0 0 0 0',1548363417),(21,1,'ADMIN','Buy item: 3467 0 0 0 0 0 0',1548371107),(22,1,'ADMIN','Buy item: 3321 0 0 0 0 0 0',1548371114),(23,1,'ADMIN','Buy item: 3316 0 0 0 0 0 0',1548371116),(24,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548372092),(25,1,'ADMIN','Buy item: 3172 61 10 0 0 0 0',1548372201),(26,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373004),(27,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373034),(28,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373041),(29,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373047),(30,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373053),(31,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373063),(32,1,'ADMIN','Buy item: 3182 61 10 0 0 0 0',1548373069),(33,1,'FILIPI2012','Buy item: 3467 0 0 0 0 0 0',1548375424),(34,1,'FILIPI2012','Buy item: 3321 0 0 0 0 0 0',1548375443),(35,1,'FILIPI2012','Buy item: 3379 0 0 0 0 0 0',1548375449),(36,1,'FILIPI2012','Buy item: 3316 0 0 0 0 0 0',1548375462),(37,1,'FILIPI2012','Buy item: 3314 0 0 0 0 0 0',1548375476),(38,1,'FILIPI2012','Buy item: 4140 0 0 0 0 0 0',1548375481),(39,1,'FILIPI2012','Buy item: 796 0 0 0 0 0 0',1548378255),(40,1,'FILIPI2012','Buy item: 4140 0 0 0 0 0 0',1548378781),(41,1,'FILIPI2012','Buy item: 774 0 0 0 0 0 0',1548378790),(42,1,'FILIPI2012','Buy item: 774 0 0 0 0 0 0',1548378844),(43,1,'FILIPI2012','Buy item: 774 0 0 0 0 0 0',1548378863),(44,1,'FILIPI2012','Buy item: 4140 0 0 0 0 0 0',1548378895),(45,1,'FILIPI2012','Buy item: 774 0 0 0 0 0 0',1548378919),(46,1,'FILIPI2012','Buy item: 3316 0 0 0 0 0 0',1548378977),(47,1,'FILIPI2012','Buy item: 3379 0 0 0 0 0 0',1548379014),(48,1,'FILIPI2012','Buy item: 3902 106 3 107 0 108 0',1548379834),(49,1,'FILIPI2012','Buy item: 3379 0 0 0 0 0 0',1548379867),(50,1,'FILIPI2012','Buy item: 3379 0 0 0 0 0 0',1548379890),(51,1,'FILIPI2012','Buy item: 3326 0 0 0 0 0 0',1548380075),(52,1,'FILIPI2012','Buy item: 3344 0 0 0 0 0 0',1548380154),(53,1,'FILIPI2012','Buy item: 774 0 0 0 0 0 0',1548380186),(54,1,'FILIPI2012','Buy item: 3316 0 0 0 0 0 0',1548380221),(55,1,'FILIPI2012','Buy item: 3316 0 0 0 0 0 0',1548380249),(56,1,'FILIPI2012','Buy item: 774 0 0 0 0 0 0',1548380349),(57,1,'FILIPI2012','Buy item: 3316 0 0 0 0 0 0',1548380910),(58,1,'FILIPI2012','Buy item: 3316 0 0 0 0 0 0',1548380971),(59,1,'FILIPI2012','Buy item: 3182 61 10 0 0 0 0',1548382377),(60,1,'FILIPI2012','Buy item: 4156 0 0 0 0 0 0',1548383600),(61,1,'FILIPI2012','Buy item: 4156 0 0 0 0 0 0',1548462473),(62,1,'FILIPI2012','Buy item: 4152 0 0 0 0 0 0',1548462483),(63,1,'FILIPI2012','Buy item: 4140 0 0 0 0 0 0',1548463017),(64,1,'FILIPI2012','Buy item: 4140 0 0 0 0 0 0',1548463800),(65,1,'FILIPI2012','Buy item: 4140 0 0 0 0 0 0',1548463970);
/*!40000 ALTER TABLE `premiun_nell_buylog` ENABLE KEYS */;

#
# Structure for table "premiun_nell_cat"
#

DROP TABLE IF EXISTS `premiun_nell_cat`;
CREATE TABLE `premiun_nell_cat` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_date` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "premiun_nell_cat"
#


#
# Structure for table "premiun_nell_itens"
#

DROP TABLE IF EXISTS `premiun_nell_itens`;
CREATE TABLE `premiun_nell_itens` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(25) NOT NULL,
  `item_price` int(4) NOT NULL,
  `item_desc` text NOT NULL,
  `item_cont` int(4) NOT NULL,
  `item_cat_id` int(4) NOT NULL,
  `item_type` tinyint(1) NOT NULL,
  `item_date` int(4) NOT NULL,
  `item__img` int(4) NOT NULL,
  `item__id` int(2) NOT NULL,
  `item__ef1` int(2) NOT NULL,
  `item__efv1` int(2) NOT NULL,
  `item__ef2` int(2) NOT NULL,
  `item__efv2` int(2) NOT NULL,
  `item__ef3` int(2) NOT NULL,
  `item__efv3` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

#
# Data for table "premiun_nell_itens"
#

/*!40000 ALTER TABLE `premiun_nell_itens` DISABLE KEYS */;
INSERT INTO `premiun_nell_itens` VALUES (1,'Frango Assado',20,'Este item lhe dará um bônus</br>\nextra de 2000 PvM.</br>\n<font color=\'yellow\'>Tempo Ativo: 4 horas.</font></br>\n<font color=\'yellow\'>Efeito não acumulativo.</font>',199,0,1,0,3314,3314,0,0,0,0,0,0),(2,'Bau de Experiência',20,'Este item dobra a taxa de</br>\nexperiência ganha.</br>\n<font color=\'yellow\'>Tempo Ativo: 2 horas.</font></br>\n<font color=\'yellow\'>Efeito acumulativo.</font>',194,0,1,0,4140,4140,0,0,0,0,0,0),(3,'Pergaminho do Perdão',400,'Perdoa os pontos caóticicos</br>\nnegativo, Deixando eles positivo.</br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font></br>\n\n\n',200,0,1,0,3343,3343,0,0,0,0,0,0),(4,'Bolsa do Andarilho',50,'Possibilita a liberação de outras</br>\nabas do seu inventário.</br>\n<font color=\'yellow\'>Tempo Ativo: 30 dias.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font></br>',197,0,1,0,37,3467,0,0,0,0,0,0),(5,'Pedra da Troca Maior',100,'Permite a mudança do nome</br>\npersonagem.</br>\n<font color=\'yellow\'>Obs: Usar junto com a pedra da troca menor.</font></br>',194,0,1,0,774,774,0,0,0,0,0,0),(6,'Pedra da Troca Menor',100,'Pedra da Troca MaiorPedra da Troca MaiorPermite a mudança do nome</br>\npersonagem.</br>\n<font color=\'yellow\'>Obs: Usar junto com a pedra da troca maior.</font></br>',200,0,1,0,775,775,0,0,0,0,0,0),(7,'Poção Divina(7dias)',100,'Poção que aumenta em abundância</br>\nseu ATK,ATK MG, HP/MP.</br>\n<font color=\'yellow\'>Obs: O aumento é tanto para PvP quanto para PvM.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font></br>',196,0,1,0,3379,3379,0,0,0,0,0,0),(8,'Poção Divina(15dias)',180,'Poção que aumenta em abundância</br>\nseu ATK,ATK MG, HP/MP.</br>\n<font color=\'yellow\'>Obs: O aumento é tanto para PvP quanto para PvM.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font></br>\n',200,0,1,0,3379,3380,0,0,0,0,0,0),(9,'Retorno de Habilidade',25,'Retorna 100 pontos de cada atributo</br>\n(FORÇA, INTELIGÊNCIA DESTREZA E CONSTITUIÇÃO).</br>\n<font color=\'yellow\'>Obs: O aumento é tanto para PvP quanto para PvM.</font></br>',200,0,1,0,3336,3336,0,0,0,0,0,0),(10,'Poção Mental(20horas)',20,'Ao utilizar você recerá um bônus extra</br>\nde aumento de  ATK e ATK MG.</br>\n<font color=\'yellow\'>Tempo Ativo: 20 dias.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font>',197,0,1,0,3321,3321,0,0,0,0,0,0),(11,'Poção Vigor(20horas)',20,'Ao utilizar você recerá um bônus extra</br>\nde aumento de HP/MP.</br>\n<font color=\'yellow\'>Tempo Ativo: 20 dias.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font>',193,0,1,0,3316,3316,0,0,0,0,0,0),(12,'Feijão Mágico(Azul)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de AZUL.</font></br>',199,0,1,0,3397,788,0,0,0,0,0,0),(13,'Feijão Mágico(Vermelho)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de VERMELHO.</font></br>',199,0,1,0,3398,789,0,0,0,0,0,0),(14,'Feijão Mágico(Verde)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de VERDE.</font></br>',199,0,1,0,3399,790,0,0,0,0,0,0),(15,'Feijão Mágico(Prateado)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de PRATEADO.</font></br>',199,0,1,0,3400,791,0,0,0,0,0,0),(16,'Feijão Mágico(Preto)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de PRETO.</font></br>',199,0,1,0,3401,792,0,0,0,0,0,0),(17,'Feijão Mágico(Roxo)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de ROXO.</font></br>',199,0,1,0,3402,793,0,0,0,0,0,0),(18,'Feijão Mágico(Marrom)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de MARROM.</font></br>',199,0,1,0,3403,794,0,0,0,0,0,0),(19,'Feijão Mágico(Verm. Escu)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de VERMELHO ESCURO.</font></br>',199,0,1,0,3404,795,0,0,0,0,0,0),(20,'Feijão Mágico(Amarelo)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de AMARELO.</font></br>',198,0,1,0,3405,796,0,0,0,0,0,0),(21,'Feijão Mágico(Azul Claro)',200,'Utilizado para pintar sua arma.</br>\n<font color=\'yellow\'>Obs: Jogue em cima da arma para pinta-la de AZUL CLARO.</font></br>',199,0,1,0,3406,797,0,0,0,0,0,0),(22,'Removedor de Tintura 5uni',250,'',199,0,5,0,3417,3417,61,5,0,0,0,0),(23,'Catalizador de Kapel',50,'De filhote para adulto das seguintes montarias:</br>\r\nDente de Sabre, Dragão Menor e Urso.</br>\r\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font>\r\n',199,0,1,0,3344,3344,0,0,0,0,0,0),(24,'Catalizador de Acuban',110,'De filhote para adulto das seguintes montarias:</br>\r\nCavalo S/Sela, Cavalo Fantasma e Cavalo Leve.</br>\r\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>\r\n<font color=\'yellow\'>Obs: Usar somente nas montarias mencionada a cima .</font>',200,0,1,0,3345,3345,0,0,0,0,0,0),(25,'Catalizador de Mencar',150,'De filhote para adulto das seguintes montarias:</br>\nCavalo Equip e Andaluz.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>\n<font color=\'yellow\'>Obs: Usar somente nas montarias mencionada a cima .</font>',198,0,1,0,3346,3346,0,0,0,0,0,0),(26,'Catalizador de Birago',160,'De filhote para adulto das seguintes montarias:</br>\nFenrir, Dragão e Fenrir Sombrio.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>\n<font color=\'yellow\'>Obs: Usar somente nas montarias mencionada a cima .</font>\n',200,0,1,0,3347,3347,0,0,0,0,0,0),(27,'Catalizador de Yus',180,'De filhote para adulto das seguintes montarias:</br>\nUnicórnio, Unisus e Pegasus.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>\n<font color=\'yellow\'>Obs: Usar somente nas montarias mencionada a cima .</font>',200,0,1,0,3348,3348,0,0,0,0,0,0),(28,'Catalizador de Makav',200,'De filhote para adulto das seguintes montarias:</br>\nGrifo, Hipo Grifo e Grifo Sangrento.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>\n<font color=\'yellow\'>Obs: Usar somente nas montarias mencionada a cima .</font>',200,0,1,0,3349,3349,0,0,0,0,0,0),(29,'Restaurador de Kapel',50,'Restaura 1 a 3 vidas das seguintes montarias:</br>\nDente de Sabre, Dragão Menor e Urso.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font>',200,0,1,0,3351,3351,0,0,0,0,0,0),(30,'Restaurador de Acuban',110,'Restaura 1 a 3 vidas das seguintes montarias:</br>\nCavalo S/Sela, Cavalo Fantasma e Cavalo Leve.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>',200,0,1,0,3352,3352,0,0,0,0,0,0),(31,'Restaurador de Mencar',150,'Restaura 1 a 3 vidas das seguintes montarias:</br>\nCavalo Equip e Andaluz.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font></br>',200,0,1,0,3353,3353,0,0,0,0,0,0),(32,'Restaurador de Birago',160,'Restaura 1 a 3 vidas das seguintes montarias:</br>\nFenrir, Dragão e Fenrir Sombrio.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font>',200,0,1,0,3354,3354,0,0,0,0,0,0),(33,'Restaurador de Yus',180,'Restaura 1 a 3 vidas das seguintes montarias:</br>\nUnicórnio, Unisus e Pegasus.</br>\n<font color=\'yellow\'>Obs: Para usar basta joga sobre a cria .</font>',200,0,1,0,3355,3355,0,0,0,0,0,0),(34,'Acelerador de Nascimento',25,'',200,0,1,0,3438,3438,0,0,0,0,0,0),(35,'Esfera da Sorte (N)',50,'',200,0,1,0,0,4128,0,0,0,0,0,0),(36,'Esfera da Sorte (M)',150,'',200,0,1,0,0,4129,0,0,0,0,0,0),(37,'Esfera da Sorte (A)',200,'',200,0,1,0,0,4130,0,0,0,0,0,0),(38,'Conj. Valquiria(30dias)',350,'Utileze este item para se vestir<br>\n como uma: Valquiria.<br>\n<font color=\'yellow\'>Obs:  O tempo será contado mesno não equipado.</font></br>',199,0,1,0,4152,4152,0,0,0,0,0,0),(39,'Conj. Esqueleto(30dias)',350,'Utileze este item para se vestir<br>\n como uma: Esqueleto.<br>\n<font color=\'yellow\'>Obs:  O tempo será contado mesno não equipado.</font></br>\n',200,0,1,0,4153,4153,0,0,0,0,0,0),(40,'Conj. Kalintz(M)(30dias)',350,'Utileze este item para se vestir<br>\n como uma: Mulher Kalintz.<br>\n<font color=\'yellow\'>Obs:  O tempo será contado mesno não equipado.</font></br>\n',200,0,1,0,4155,4155,0,0,0,0,0,0),(41,'Conj. Kalintz(F)(30dias)',350,'Utileze este item para se vestir<br>\n como uma: Homen Kalintz.<br>\n<font color=\'yellow\'>Obs:  O tempo será contado mesno não equipado.</font></br>\n',198,0,1,0,4156,4156,0,0,0,0,0,0),(42,'Fada Verde(3dias)',50,'Equipe a fada para oberte um</br>\naumento de 16% na taxa Exp.</br>\n<font color=\'yellow\'>Obs: Não gasta caso a fada não esteja equipada .</font></br>',200,0,1,0,3900,3900,106,3,107,0,108,0),(43,'Fada Azul(3dias)',50,'Equipe a fada para oberte um</br>\naumento de 32% na taxa de drop.</br>\n<font color=\'yellow\'>Obs: Não gasta caso a fada não esteja equipada .</font></br>',200,0,1,0,3901,3901,106,3,107,0,108,0),(44,'Fada Vermelha(3dias)',70,'Equipe a fada para oberte um aumento </br>\nde 16% na taxa Exp e 32% na taxa de Drop.</br>\n<font color=\'yellow\'>Obs: Não gasta caso a fada não esteja equipada .</font></br>\n',199,0,1,0,3902,3902,106,3,107,0,108,0),(45,'Perg.  da Água(N) 10uni',50,'Teletransporta  todo o grupo para a</br>\nzona elemental da água (NORMAL).</br>\n<font color=\'yellow\'>Obs: Use na zona elemental da água.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font>',200,0,10,0,3173,3173,61,10,0,0,0,0),(46,'Perg.  da Água(M) 10uni',100,'Teletransporta  todo o grupo para a</br>\nzona elemental da água (MÍSTICO).</br>\n<font color=\'yellow\'>Obs: Use na zona elemental da água.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font>',200,0,10,0,777,777,61,10,0,0,0,0),(47,'Perg.  da Água(A) 10uni',150,'Teletransporta  todo o grupo para a</br>\nzona elemental da água (ARCANO).</br>\n<font color=\'yellow\'>Obs: Use na zona elemental da água.</font></br>\n<font color=\'yellow\'>Obs: Para usar clique com o butão direito.</font>',1991,0,10,0,3182,3182,61,10,0,0,0,0),(48,'Carta de Duelo(N) 10uni',50,'Item necessário para testar a sua<br>\nbravura no Quarto Secreto (NORMAL).</br>\n<font color=\'yellow\'>Obs: Usar no altar de noatun .</font></br>\n\n<font color=\'yellow\'>Obs: impossível usar em horários de guerra.</font>',199,0,10,0,3172,3172,61,10,0,0,0,0),(49,'Carta de Duelo(M) 10uni',100,'Item necessário para testar a sua<br>\nbravura no Quarto Secreto (MÍSTICO).</br>\n<font color=\'yellow\'>Obs: Usar no altar de noatun .</font></br>\n<font color=\'yellow\'>Obs: impossível usar em horários de guerra.</font>\n',200,0,10,0,3171,3171,0,0,0,0,0,0),(50,'Carta de Duelo(A) 10uni',150,'Item necessário para testar a sua<br>\nbravura no Quarto Secreto (ARCANO).</br>\n<font color=\'yellow\'>Obs: Usar no altar de noatun .</font></br>\n<font color=\'yellow\'>Obs: impossível usar em horários de guerra.</font>\n\n',200,0,10,0,1731,1731,61,10,0,0,0,0),(51,'Pesadelo(N) 10uni',50,'',200,0,0,0,3324,3324,0,0,0,0,0,0),(52,'Pesadelo(M) 10uni',100,'',200,0,0,0,3325,3325,0,0,0,0,0,0),(53,'Pesadelo(A) 10uni',150,'',199,0,0,0,3326,3326,0,0,0,0,0,0),(54,'Refinação Abençoada',200,'Item usando no lugar das pedras secretas</br>\npara diminuir a chance de falha na refinação +12 +.</br>\n<font color=\'yellow\'>Obs: Use com o emblema da proteção .</font>',2000,0,1,0,3338,3338,0,0,0,0,0,0);
/*!40000 ALTER TABLE `premiun_nell_itens` ENABLE KEYS */;
