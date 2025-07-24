<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
$smarty = new Smarty\Smarty();
$smarty->escape_html = true;

$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
