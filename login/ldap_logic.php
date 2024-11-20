<?php

function user_authorization($username, $password){
  $domain = 'yourdomain.com';
  $ldapconfig['host'] = 'yourhosthere';
  $ldapconfig['port'] = 389;
  $ldapconfig['basedn'] = 'dc=domain,dc=com';

  $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
  ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
  ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

  $dn="ou=Technology,".$ldapconfig['basedn'];
  $bind=ldap_bind($ds, $username .'@' .$domain, $password);

  if ($bind) {
      return true;
  } else {
      return false;
  }
}

?>
