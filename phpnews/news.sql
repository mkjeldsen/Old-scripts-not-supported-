#
# Newsscript by Michael Kjeldsen aka exp
# website: www.firewerx.dk
#

#
# Struktur dump for tabellen `news`
#

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `dato` tinytext NOT NULL,
  `overskrift` text NOT NULL,
  `text` text NOT NULL,
  `status` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

#
# Data dump for tabellen `news`
#

INSERT INTO `news` (`id`, `dato`, `overskrift`, `text`, `status`) VALUES (1, '1044397412', 'Så er der nyheder!', 'Der kan let tilføjes nye funktioner, fx smilies o.lign.\r\n\r\nFx konverteres indtastede url\\\'s og emailadresser til klikbare links :o)\r\n\r\nLæs readme.txt for flere detaljer!\r\n\r\nVenligst\r\nexp\r\nwww.firewerx.dk\r\nexp@firewerx.dk', 1);

#
# Struktur dump for tabellen `brugere`
#

CREATE TABLE users (
  id tinyint(4) NOT NULL auto_increment,
  navn varchar(12) NOT NULL default '',
  password tinytext NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;

#
# Data dump for tabellen `users`
#

INSERT INTO users VALUES (1, 'admin', md5('admin'));