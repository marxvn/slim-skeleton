<?php
namespace App\Providers;

use Base\Mailer;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class EmailProvider implements ServiceProviderInterface
{
    /**
     * Registering application error handler provider
     *
     * @param  Container  $container
     */
    public function register(Container $container)
    {
        if (!isset($container['settings']['mailer'])) {
            throw new \InvalidArgumentException('Email configuration not found');
        }

        $container['mailer'] = function (Container $container) {
            $settings = $container['settings'];

            $mailer = new Mailer($settings['mailer']);

            $mailer->setView($container['view']);
            $mailer->setLogger($container['logger']);

            $mailer->debugMode($settings['mode']);
            $mailer->setSender($settings['email'], $settings['name']);

            return $mailer;
        };
    }
}
