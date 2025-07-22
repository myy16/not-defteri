<?php

require 'smarty.php';

$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->display('pages/dashboard.tpl');
