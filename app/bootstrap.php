<?php 

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;

use Triangon\User\User;
use Triangon\Helpers\Hash;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT .'/vendor/autoload.php';

$app = new Slim([
	'mode' => file_get_contents(INC_ROOT . '/mode.php'),
	'view' => new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->configureMode($app->config('mode'),function() use ($app){
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});


require 'database.php';
require 'routes.php';

$app->container->set('user', function(){
	return new User;
});

$app->container->singleton('hash', function() use ($app){
	return new Hash($app->config);
});


$app->get('/', function() use ($app){
	$app->render('home.php');
});

$view = $app->view();

$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions =[
	new TwigExtension
];


$password="1q2w3e";
$hash = '$2y$10$m2jMTVxCcd.IwS.FkBMCje6.K728Daej4GjE49XpaUXD4/x8X7MmK';
echo $app->hash->password('1q2w3ed');

var_dump($app->hash->passwordCheck($password, $hash));