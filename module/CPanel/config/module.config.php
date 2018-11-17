<?php
/**
 * @access protected
 * @author
 */

namespace Kubnete\CPanel;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [
        'factories' => [
            // 'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            // 'configuration' => Navigation\Service\ConfigurationNavigationFactory::class
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                InvokableFactory::class
        ],
    ],

    'router' => [
        'routes' => [
            //'cpanel' => [
            //    // 'type' => \Zend\Router\Http\Segment::class,
            //    // 'options' => [
            //    //     'route' => '/admin[/]',
            //    //     'defaults' => [
            //
            //    //     ],
            //    // ],
            //    // 'may_terminate' => true,
            //    'child_routes' => [
            //        'changelog' => [
            //            'type' => 'Segment',
            //            'options' => [
            //                'route' => 'changelog[/]',
            //                'defaults' => [
            //                    'controller' => Controller\IndexController::class,
            //                    'action' => 'changelog',
            //                ],
            //            ],
            //            'may_terminate' => true
            //        ],
            //        'login' => [
            //            'type' => 'Segment',
            //            'options' => [
            //                'route' => 'login[/:redirect]',
            //                'defaults' => [
            //                    'action' => 'login',
            //                ],
            //            ],
            //            'may_terminate' => true
            //        ],
            //        'logout' => [
            //            'type' => 'Segment',
            //            'options' => [
            //                'route' => 'logout[/]',
            //                'defaults' => [
            //                    'action' => 'logout',
            //                ],
            //            ],
            //            'may_terminate' => true
            //        ],
            //    ]
            //],
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
        ],
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],

    'translator' => [
        // 'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ],
        ],
    ],

    'navigation' => [
//        \MSBios\CPanel\Navigation\Sidebar::class => [
//            // 'dashboard' => [
//            //     'label' => 'Dashboard',
//            //     'route' => 'backend',
//            //     'class' => 'icon-display4 position-left',
//            //     'order' => 0
//            // ],
//            'module' => [
//                'label' => 'Modules',
//                'uri' => '/uri',
//                'class' => 'icon-link2 position-left',
//                'order' => 600
//            ], [
//                'label' => 'Statistics',
//                'uri' => '/uri',
//                'class' => 'icon-stats-dots position-left',
//                'order' => 800,
//            ], [
//                'label' => 'Config',
//                'uri' => '/uri',
//                'class' => 'icon-cog3 position-left',
//                'order' => 1000,
//                'pages' => [
//                    [
//                        'label' => 'General',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'System',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'Server',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'Update',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'Update',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'User',
//                        'uri' => '/uri',
//                    ],
//                ],
//            ],
//        ],
//        'configuration' => [
//            'config' => [
//                'label' => 'Config',
//                'class' => 'icon-cog3 position-left',
//                'pages' => [
//                    [
//                        'label' => 'General',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'System',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'Server',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'Update',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'Update',
//                        'uri' => '/uri',
//                    ], [
//                        'label' => 'User',
//                        'uri' => '/uri',
//                    ]
//                ]
//            ]
//        ]
    ]
];
