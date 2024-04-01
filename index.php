<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Container\ContainerInterface;
use App\Data\DataContext;
use App\Settings\Settings;
use Slim\Views\Twig;

require __DIR__ . '/vendor/autoload.php';

// Create the application container using PHP-DI
$container = new Container();

// Add the app settings service from the Settings class
$container->set('settings', function () {
    // Load the settings from a file
    $settings = require __DIR__ . '/app/settings.php';
    return new Settings($settings);
});

// Add the Twig view engine service
$container->set('view', function () {
    return Twig::create('src/Views/', ['cache' => false]);
});

// Add the database context service
$container->set('db', function (ContainerInterface $container) {
    return new DataContext($container->get('settings')->get());
});

// Configure the application via container
$app = AppFactory::createFromContainer($container);

// Add routing middleware for route handling
$app->addRoutingMiddleware();

// Define app routes
$routes = require __DIR__ . '/app/routes.php';
$routes($app);

// Error middleware for error handling
$app->addErrorMiddleware(true, true, true);

// Run the application
$app->run();
