<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Frontend;

return [

    'view_manager' => [
//        'display_not_found_reason' => true,
//        'display_exceptions'       => true,
//        'doctype'                  => 'HTML5',
//        'not_found_template'       => 'error/404',
//        'exception_template'       => 'error/index',
//        'template_map' => [
//            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
//            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            'error/404'               => __DIR__ . '/../view/error/404.phtml',
//            'error/index'             => __DIR__ . '/../view/error/index.phtml',
//        ],
//        'template_path_stack' => [
//            __DIR__ . '/../view',
//
//        ],
    ],

    'controllers' => [
        'invokables' => [
            // Invokables
        ],
        'factories' => [
            Controller\IndexController::class => Factory\IndexControllerFactory::class,
        ]
    ],

    'router' => [
        'routes' => [
            'frontend' => [
                'type' => 'Regex',
                'options' => [
                    'regex' => '^/(?!admin?/)(?<path>.*)',
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
