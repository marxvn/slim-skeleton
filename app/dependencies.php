<?php
/**
 * Application DIC Configuration
 *
 * @var  Container  $container
 * @var  array  $settings
 */

use App\Handlers;
use Slim\Container;

/**
 * Registering all defined providers
 */
foreach ($settings['providers'] as $provider) {
    $container->register(new $provider);
}

if ($settings['mode'] !== 'development') {
    /**
     * Overwrite default Slim errorHandler container
     *
     * @param  Container  $c
     *
     * @return Handlers\ErrorHandler
     */
    $container['errorHandler'] = function (Container $c) use ($settings) {
        $handler = new Handlers\ErrorHandler($settings['displayErrorDetails']);
        $handler->setView($c['view']);
        $handler->setLogger($c['logger']);

        return $handler;
    };
}

/**
 * Overwrite default Slim notFoundHandler container
 *
 * @param  Container  $c
 *
 * @return Handlers\NotFoundHandler
 */
$container['notFoundHandler'] = function (Container $c) {
    $handler = new Handlers\NotFoundHandler;
    $handler->setView($c['view']);
    $handler->setLogger($c['logger']);

    return $handler;
};

/**
 * Enable flash message using native PHP Session
 */
$container['flash'] = function () {
    return new Slim\Flash\Messages;
};

/**
 * Setup Validator
 * 
 * @uses   $settings
 * @param  Container  $c
 * 
 * @return \Valitron\Validator
 */
$container['validator'] = function (Container $c) use ($settings) {
    $params = $c['request']->getParams();
    $lang = $settings['lang'];

    return new Valitron\Validator($params, [], $lang['default']);
};
