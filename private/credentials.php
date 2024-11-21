<?php
  // get db hostname from environment, otherwise set to localhost
  $db_host = (getenv('MARIADB_HOST') !== false) ? getenv('MARIADB_HOST') : 'localhost';
  
  define("DB_SERVER", $db_host);
  define("DB_USER", "cybergame");
  define("DB_PASS", "zia8#My*uVw27Lg");
  define("DB_NAME", "cybergame");


  define("DOMAIN", "your domain here");
  define("LDAPCONFIG", [
    'host' => 'your ldap host here',
    'port' => 389 //default ldap port change as needed
  ]);

 ?>
