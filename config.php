<?php

// Speeddial Configuration

$tempPassword = file_get_contents('/var/www/sd_pass');
$tempPassword = substr($tempPassword, 0, (strlen($tempPassword) -1));

define("SD_LIBDIR", './lib/');





?>