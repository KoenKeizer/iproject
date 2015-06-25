<?php 

// In dit bestand vind je alle instellingen, zoals databasegegevens.

// Voor de veiligheid zou dit bestand boven de webroot geplaatst moeten worden. 

// Definieer de status van het project
define('PROJECT_STATUS','development');

// Stel de instellingen in op Nederlands
setlocale(LC_ALL, 'nl_NL');
// Instellingen voor een Windows server
//setlocale(LC_ALL, 'nld_nld');

// databasegegevens
define('DB_HOST','localhost');
define('DB_NAME','photoblock');
define('DB_USERNAME','roflcopter');
define('DB_PASSWORD','root123');

?>
