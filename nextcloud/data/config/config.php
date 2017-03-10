<?php
$CONFIG = array (
  'trusted_domains' => 
  array (
    0 => 'NEXTCLOUD_BASE_URL',
    1 => 'DEX_BASE_URL',
  ),
  'datadirectory' => '/var/www/html/data/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'overwrite.cli.url' => 'https://NEXTCLOUD_BASE_URL',
  'dbtype' => 'mysql',
  'version' => '11.0.1.2',
  'dbname' => 'nextcloud',
  'dbhost' => 'db',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'dbuser' => 'oc_admin',
  'dbpassword' => 'NEXTCLOUD_MYSQL_PWD',
  'logtimezone' => 'UTC',
  'loglevel' => '0',
  'installed' => true,
  'openid_connect' => array (
        'openidconnect' => array (
          'displayName' => 'OpenID@DEX',
          'provider' => 'https://DEX_BASE_URL',
          'client_id' => 'nextcloud',
          'client_secret' => 'NEXTCLOUD_OAUTH_SECRET',
          'scopes' => array('openid','email','profile'),
        )
     )
);

