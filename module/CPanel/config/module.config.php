<?php
/**
 * @access protected
 * @author
 */

namespace MSBios\Document\CPanel;

use Zend\Router\Http\Segment;
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
            Controller\DataTypeController::class =>
                Factory\DataTypeControllerFactory::class,
            Controller\DocumentTypeController::class =>
                Factory\DocumentTypeControllerFactory::class,
            Controller\IndexController::class =>
                InvokableFactory::class,
            Controller\TemplateController::class =>
                Factory\TemplateControllerFactory::class
        ],
    ],

    'router' => [
        'routes' => [
            'cpanel' => [
                'child_routes' => [
                    'document-type' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'document-type/[:action[/[:id[/]]]]',
                            'defaults' => [
                                'controller' => Controller\DocumentTypeController::class,
                                'action' => 'index'
                            ],
                            'constraints' => [
                                'action' => 'add|edit|drop',
                                'document_id' => '[0-9]+',
                                'id' => '[0-9]+'
                            ],
                        ],
                    ],

                    'template' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'template/[:action[/[:id[/]]]]',
                            'defaults' => [
                                'controller' => Controller\TemplateController::class,
                                'action' => 'index'
                            ],
                            'constraints' => [
                                'action' => 'add|edit|drop',
                                'document_id' => '[0-9]+',
                                'id' => '[0-9]+'
                            ],
                        ],
                    ],

                    'data-type' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'data-type/[:action[/[:id[/]]]]',
                            'defaults' => [
                                'controller' => Controller\DataTypeController::class,
                                'action' => 'index'
                            ],
                            'constraints' => [
                                'action' => 'add|edit|drop',
                                'document_id' => '[0-9]+',
                                'id' => '[0-9]+'
                            ],
                        ],
                    ],
                ]
            ],
        ],
    ],

    'view_manager' => [
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',

            'ms-bios/document/c-panel/data-type/add' =>
                __DIR__ . '/../view/ms-bios/document/c-panel/data-type/form.phtml',
            'ms-bios/document/c-panel/data-type/edit' =>
                __DIR__ . '/../view/ms-bios/document/c-panel/data-type/form.phtml',

            'ms-bios/document/c-panel/document-type/add' =>
                __DIR__ . '/../view/ms-bios/document/c-panel/data-type/form.phtml',
            'ms-bios/document/c-panel/document-type/edit' =>
                __DIR__ . '/../view/ms-bios/document/c-panel/document-type/form.phtml',

            'ms-bios/document/c-panel/template/add' =>
                __DIR__ . '/../view/ms-bios/document/c-panel/template/form.phtml',
            'ms-bios/document/c-panel/template/edit' =>
                __DIR__ . '/../view/ms-bios/document/c-panel/template/form.phtml',
        ],
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],

    'translator' => [
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
