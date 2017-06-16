<?php

$container = $app->getContainer();

################################### Service ###################################
// View engine
$container['view'] = function ($container) {
    $settings = $container->get('settings')['view'];

    $view = new \Slim\Views\Twig(
        $settings['template_path'],
        $settings['twig']
    );
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->get('router'),
        $container->get('request')->getUri())
    );
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['sms'] = function ($container) {
    $settings = $container->get('settings')['sms-gateway'];

    $sms = new \App\Extensions\Sms\SmsHandler(
        $settings['api_key'],
        $settings['api_secret']
    );

    return $sms;
};

################################# Controllers #################################
$container['SmsController'] = function ($container) {
    return new \App\Controllers\SmsController($container);
};