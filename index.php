<?php
/**
 * Created by PhpStorm.
 * User: mncedim
 * Date: 17/03/04
 * Time: 6:01 PM
 */

$result = mail('admin@startup.com', 'Project Startup', 'Email successfully sent via mailhog');
var_dump($result ? 'email function working':'email function test failed');

phpinfo();