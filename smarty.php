<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
$smarty = new Smarty\Smarty();

$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
// $smarty->setCacheDir('/web/www.example.com/smarty/cache');
// $smarty->setConfigDir('/web/www.example.com/smarty/configs');
