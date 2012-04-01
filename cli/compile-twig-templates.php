#!/usr/bin/php -q
<?php
defined('APPLICATION_ROOT')
    || define('APPLICATION_ROOT', realpath(dirname(__FILE__) . '/../'));
require APPLICATION_ROOT . '/vendor/.composer/autoload.php';

$twigConfig = include APPLICATION_ROOT . '/config/twig.php';

foreach ($twigConfig['paths'] as $path) {
    echo 'Path: ' . $path . PHP_EOL;
}
$loader = new Twig_Loader_Filesystem($twigConfig['paths']);
echo 'Cache: '. $twigConfig['environment']['cache'] . PHP_EOL;
echo 'Debug: '. $twigConfig['environment']['debug'] . PHP_EOL;
$twig = new Twig_Environment($loader, $twigConfig['environment']);

foreach ($twigConfig['templates'] as $templateName) {
    $twig->loadTemplate($templateName);
}

exit(0);
