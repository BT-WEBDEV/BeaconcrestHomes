<?php
/*
 * $loader needs to be a relative path to an autoloader script.
 * Swift Mailer's autoloader is swift_required.php in the lib directory.
 * If you used Composer to install Swift Mailer, use vendor/autoload.php.
 */
$loader = __DIR__ . '/vendor/autoload.php';

require_once $loader;

/*
 * Login details for mail server
 */
$smtp_server = 'p3plcpnl0754.prod.phx3.secureserver.net';
$username = 'no-reply@beaconcresthomes.com';
$password = 'beaconcrest1!';
