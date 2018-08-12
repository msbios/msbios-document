<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Backend;

return [

    'service_manager' => [
        'factories' => [
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'configuration' => Navigation\Service\ConfigurationNavigationFactory::class
        ],
    ],

    'controllers' => [
        'invokables' => [
            Controller\IndexController::class => Controller\IndexController::class
        ],
        'factories' => [

        ],
    ],

    'router' => [
        'routes' => [
            'backend' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/admin[/]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'changelog' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'changelog[/]',
                            'defaults' => [
                                'action' => 'changelog',
                            ],
                        ],
                        'may_terminate' => true
                    ],
                    'login' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'login[/:redirect]',
                            'defaults' => [
                                'action' => 'login',
                            ],
                        ],
                        'may_terminate' => true
                    ],
                    'logout' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'logout[/]',
                            'defaults' => [
                                'action' => 'logout',
                            ],
                        ],
                        'may_terminate' => true
                    ],
                ]
            ],
        ],
    ],

    'view_manager' => [
        // 'display_not_found_reason' => true,
        // 'display_exceptions'       => true,
        // 'doctype'                  => 'HTML5',
        // 'not_found_template'       => 'error/404',
        // 'exception_template'       => 'error/index',
        // 'template_map' => [
        //     'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        //     'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
        //
        //     'error/index'             => __DIR__ . '/../view/error/index.phtml',
        // ],
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
        ],
        'template_path_stack' => [
            'backend' => __DIR__ . '/../view',
        ],
    ],

    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ],
        ],
    ],

    'navigation' => [
        'default' => [
            'dashboard' => [
                'label' => 'Dashboard',
                'route' => 'backend',
                'class' => 'icon-display4 position-left',
                'order' => 0
            ],
            'module' => [
                'label' => 'Modules',
                'uri' => '/uri',
                'class' => 'icon-link2 position-left',
                'order' => 600
            ], [
                'label' => 'Statistics',
                'uri' => '/uri',
                'class' => 'icon-stats-dots position-left',
                'order' => 800,
            ], [
                'label' => 'Config',
                'uri' => '/uri',
                'class' => 'icon-cog3 position-left',
                'order' => 1000,
                'pages' => [
                    [
                        'label' => 'General',
                        'uri' => '/uri',
                    ], [
                        'label' => 'System',
                        'uri' => '/uri',
                    ], [
                        'label' => 'Server',
                        'uri' => '/uri',
                    ], [
                        'label' => 'Update',
                        'uri' => '/uri',
                    ], [
                        'label' => 'Update',
                        'uri' => '/uri',
                    ], [
                        'label' => 'User',
                        'uri' => '/uri',
                    ],
                ]
            ],
        ],
        'configuration' => [
            'config' => [
                'label' => 'Config',
                'class' => 'icon-cog3 position-left',
                'pages' => [
                    [
                        'label' => 'General',
                        'uri' => '/uri',
                    ], [
                        'label' => 'System',
                        'uri' => '/uri',
                    ], [
                        'label' => 'Server',
                        'uri' => '/uri',
                    ], [
                        'label' => 'Update',
                        'uri' => '/uri',
                    ], [
                        'label' => 'Update',
                        'uri' => '/uri',
                    ], [
                        'label' => 'User',
                        'uri' => '/uri',
                    ]
                ]
            ]
        ]
    ]
];
