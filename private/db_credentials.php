<?php
  // get db hostname from environment, otherwise set to localhost
  $db_host = (getenv('MARIADB_HOST') !== false) ? getenv('MARIADB_HOST') : 'localhost';

  define("DB_SERVER", $db_host);
  define("DB_USER", "cybergame");
  define("DB_PASS", "zia8#My*uVw27Lg");
  define("DB_NAME", "cybergame");

  define("USER_CREDENTIALS", [
    "jporter" => "vqy6a77ihq",
    "rweber" => "b9ps6k5zx0",
    "aborgstrom" => "tk68v99xuu",
    "cschauf" => "6r7c3ws7z6",
    "hboesl" => "m5etrvr22x",
    "jhuffman" => "1ng22gn6q8"
  ]);
 ?>
