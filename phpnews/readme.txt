Copyright notice:
Dette script er 100% opensource, det eneste krav jeg stiller er, at der ikke �ndres i headeren:

Newsscript by Michael Kjeldsen aka exp
website: www.firewerx.dk


Om modulet:
systemet er opbygget omkring en r�kke php-filer, der alle kan includeres - eneste umiddelbare krav er, at alle filer ligger i samme bibliotek. (Dette kan dog let �ndres, med lidt snilde!)


Filerne:
add.php			: Siden du indtaster nyhederne p�, passwordbeskyttet. (Back-end)
addpost.php		: Filen der inds�tter de indtastede data.
admin_inc.php		: Filen der includerer oversigten + slet-funktionen i add.php.
del.php			: Filen der udf�rer slet-kommandoen. (Indl�ggene slettes ikke, de fjernes bare fra online-listen)
include.php		: Konfigurationsfil, eneste fil du som udgangspunkt skal redigere i. Tilpasses dit webhotel.
news.php		: Forside-filen med nyhederne. (Front-end)
tagster_lib.php		: Funktionsfil, der omdanner indtastede url's og emailadresser til klikbare links. (Se fil for yderligere detaljer. Distribueres med tilladelse fra Lars Jensen [www.ljweb.biz])
news.sql		: Databasestruktur til nyhedssystemet


Om programm�ren:
Se www.firewerx.dk for yderligere detaljer.
Kontakt: exp@firewerx.dk