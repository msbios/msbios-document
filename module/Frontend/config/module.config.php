<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Frontend;

use Zend\Router\Http\Regex;

return [

    'controllers' => [
        'invokables' => [
            // Invokables
        ],
        'factories' => [
            Controller\IndexController::class =>
                Factory\IndexControllerFactory::class,
        ]
    ],

    'router' => [
        'routes' => [
            'home' => [
                'type' => Regex::class,
                'options' => [
                    'regex' => '^/(?!cpanel?/)(?<path>.*)',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                    'spec' => '/%path%',
                ],
            ],
        ],
    ],

    'service_manager' => [
        'invokables' => [
            EventManager\DocumentListener::class => EventManager\DocumentListener::class,
        ],
        'factories' => [

        ],
    ],

    'view_helpers' => [
        'factories' => [
            'document' => Factory\DocumentHelperFactory::class,
            'children' => Factory\ChildrenHelperFactory::class
        ]
    ],

    'listeners' => [
        EventManager\DocumentListener::class
    ]
];
