<?php

  // Assign file paths to PHP constants
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("RESOURCE_PATH", '/cybergame/resources/');
  define("CSS_PATH", '/cybergame/css/styles.css');

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 10;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('functions.php');
  require_once('database.php');
  require_once('session.php');
  session_start();

  $db = db_connect();
?>
