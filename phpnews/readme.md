# PHP News - an open source php-script for publishing news

## Copyright notice:
Dette script er 100% opensource, det eneste krav jeg stiller er, at der ikke ændres i headeren:

> Newsscript by Michael Kjeldsen aka exp
> 
> Website: www.firewerx.dk

## Om modulet:
Systemet er opbygget omkring en række php-filer, der alle kan includeres - eneste umiddelbare krav er, at alle filer ligger i samme bibliotek. (Dette kan dog let ændres, med lidt snilde!)

## Filerne:
Filnavn|Beskrivelse
-------|-----------
add.php|Siden du indtaster nyhederne på, passwordbeskyttet. (Back-end)
addpost.php|Filen der indsætter de indtastede data.
admin_inc.php|Filen der includerer oversigten + slet-funktionen i add.php.
del.php|Filen der udfører slet-kommandoen. (Indlæggene slettes ikke, de fjernes bare fra online-listen)
include.php|Konfigurationsfil, eneste fil du som udgangspunkt skal redigere i. Tilpasses dit webhotel.
news.php|Forside-filen med nyhederne. (Front-end)
tagster_lib.php|Funktionsfil, der omdanner indtastede url's og emailadresser til klikbare links. (Se fil for yderligere detaljer. Distribueres med tilladelse fra [Lars Jensen]([www.ljweb.biz)
news.sql|Databasestruktur til nyhedssystemet

## Om programmøren:
Se www.firewerx.dk for yderligere detaljer.
Kontakt: exp@firewerx.dk
