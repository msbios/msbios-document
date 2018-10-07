<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document;

use Zend\Router\Http\Regex;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Regex::class,
                'options' => [
                    'regex' => '^/(?!cpanel?/)(?<path>.*)',
                    'spec' => '/%path%',
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                Factory\IndexControllerFactory::class,
        ],
        'aliases' => [
            \MSBios\Application\Controller\IndexController::class =>
                Controller\IndexController::class
        ]
    ],

    'service_manager' => [
        'factories' => [
            DocumentListener::class =>
                Factory\DocumentListenerFactory::class,
            // DocumentService::class =>
            //     Factory\DocumentServiceFactory::class
        ],
    ],


    'view_manager' => [
        'template_map' => [
            // ...
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'listeners' => [
        DocumentListener::class
    ]
];
