<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Development;

use Zend\Router\Http\Segment;

return [

    'controllers' => [
        'invokables' => [

        ],
        'factories' => [
            Controller\DataTypeController::class => Factory\DataTypeControllerFactory::class,
            Controller\DocumentTypeController::class => Factory\DocumentTypeControllerFactory::class,
            Controller\TemplateController::class => Factory\TemplateControllerFactory::class
        ],
    ],

    'form_elements' => [
        'invokables' => [

            Form\TemplateForm::class => Form\TemplateForm::class,
        ],
        'factories' => [
            Form\TypeTab\PropertyFieldset::class => Factory\TypeTab\PropertyFieldsetFactory::class,

            Form\DataTypeForm::class => Factory\DataTypeFormFactory::class,
            Form\DocumentTypeForm::class => Factory\DocumentTypeFormFactory::class,
            Form\TypeTabFieldset::class => Factory\TypeTabFieldsetFactory::class,
        ]
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

                    'development' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => 'development[/]',
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            //'document-type' => [
                            //    'type' => \Zend\Router\Http\Segment::class,
                            //    'options' => [
                            //        'route' => 'document-type[/]',
                            //        'defaults' => [
                            //            'controller' => Controller\DocumentTypeController::class,
                            //        ],
                            //    ],
                            //    'may_terminate' => true,
                            //    'child_routes' => [
                            //        'add' => [
                            //            'type' => \Zend\Router\Http\Segment::class,
                            //            'options' => [
                            //                'route' => 'add[.html]',
                            //                'defaults' => [
                            //                    'action' => 'add',
                            //                ],
                            //            ],
                            //            'may_terminate' => true
                            //        ],
                            //        'edit' => [
                            //            'type' => \Zend\Router\Http\Segment::class,
                            //            'options' => [
                            //                'route' => 'edit/:id[.html]',
                            //                'defaults' => [
                            //                    'action' => 'edit',
                            //                ],
                            //                'constraints' => [
                            //                    'id' => '[0-9]+',
                            //                ],
                            //            ],
                            //            'may_terminate' => true
                            //        ],
                            //        'delete' => [
                            //            'type' => 'Segment',
                            //            'options' => [
                            //                'route' => '/delete/:id[.html]',
                            //                'defaults' => [
                            //                    'action' => 'delete',
                            //                ],
                            //                'constraints' => [
                            //                    'id' => '[0-9]+',
                            //                ],
                            //            ],
                            //            'may_terminate' => true
                            //        ],
                            //    ],
                            //],
                            //'template' => [
                            //    'type' => \Zend\Router\Http\Segment::class,
                            //    'options' => [
                            //        'route' => 'template[/]',
                            //        'defaults' => [
                            //            'controller' => Controller\TemplateController::class,
                            //        ],
                            //        'constraints' => [
                            //            'id' => '[0-9]+',
                            //        ],
                            //    ],
                            //    'may_terminate' => true,
                            //    'child_routes' => [
                            //        'add' => [
                            //            'type' => \Zend\Router\Http\Segment::class,
                            //            'options' => [
                            //                'route' => 'add[.html]',
                            //                'defaults' => [
                            //                    'action' => 'add',
                            //                ],
                            //            ],
                            //            'may_terminate' => true
                            //        ],
                            //        'edit' => [
                            //            'type' => \Zend\Router\Http\Segment::class,
                            //            'options' => [
                            //                'route' => 'edit/:id[.html]',
                            //                'defaults' => [
                            //                    'action' => 'edit',
                            //                ],
                            //            ],
                            //            'may_terminate' => true
                            //        ],
                            //        'delete' => [
                            //            'type' => 'Segment',
                            //            'options' => [
                            //                'route' => '/delete/:id[.html]',
                            //                'defaults' => [
                            //                    'action' => 'delete',
                            //                ],
                            //            ],
                            //            'may_terminate' => true
                            //        ],
                            //    ],
                            //],
                            'data-type' => [
                                'type' => \Zend\Router\Http\Segment::class,
                                'options' => [
                                    'route' => 'data-type[/]',
                                    'defaults' => [
                                        'controller' => Controller\DataTypeController::class,
                                    ],
                                    'constraints' => [
                                        'id' => '[0-9]+',
                                    ],
                                ],
                                'may_terminate' => true,
                                'child_routes' => [
                                    'add' => [
                                        'type' => \Zend\Router\Http\Segment::class,
                                        'options' => [
                                            'route' => 'add[.html]',
                                            'defaults' => [
                                                'action' => 'add',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                    'edit' => [
                                        'type' => \Zend\Router\Http\Segment::class,
                                        'options' => [
                                            'route' => 'edit/:id[.html]',
                                            'defaults' => [
                                                'action' => 'edit',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                    'delete' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'delete/:id[.html]',
                                            'defaults' => [
                                                'action' => 'delete',
                                            ]
                                        ],
                                        'may_terminate' => true
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'development' => __DIR__ . '/../view',
            'template' => './data/tmp'
        ],
        'template_map' => [
            'kubnete/development/template/add'
                => __DIR__ . '/../view/kubnete/development/template/form.phtml',
            'kubnete/development/template/edit'
                => __DIR__ . '/../view/kubnete/development/template/form.phtml',
        ],
    ],

    'navigation' => [
        \MSBios\CPanel\Navigation\Sidebar::class => [
            'development' => [
                'label' => 'Development',
                'uri' => '/uri',
                'class' => 'icon-design position-left',
                'order' => 400,
                'pages' => [
                    'document-type' => [
                        'label' => 'Document types',
                        'title' => 'List of Document types',
                        'route' => 'cpanel/document-type',
                        'order' => 0,
                        'class' => 'icon-file-empty2 position-left',
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new document type',
                                'route' => 'cpanel/document-type/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected document type',
                                'route' => 'cpanel/document-type/edit',
                            ]
                        ]
                    ],
                    'template' => [
                        'label' => 'Template',
                        'title' => 'List of Templates',
                        'route' => 'cpanel/template',
                        'order' => 200,
                        'class' => 'icon-insert-template position-left',
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new template',
                                'route' => 'cpanel/template/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected template',
                                'route' => 'cpanel/template/edit',
                            ]
                        ]
                    ],
                    'script' => [
                        'label' => 'Scripts',
                        'uri' => '/uri',
                        'order' => 400,
                        'class' => 'icon-qrcode position-left'
                    ],
                    'datatype' => [
                        'label' => 'Datatypes',
                        'title' => 'List of Data types',
                        'route' => 'cpanel/development/data-type',
                        'order' => 600,
                        'class' => 'icon-drive position-left',
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new data type',
                                'route' => 'cpanel/development/data-type/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected data type',
                                'route' => 'cpanel/development/data-type/edit',
                            ]
                        ]
                    ],
                ],
            ],
        ],
    ],

    \MSBios\Guard\Module::class => [
        'resource_providers' => [
            \MSBios\Guard\Provider\ResourceProvider::class => [
                Controller\TemplateController::class => [],
            ],
        ],

        'rule_providers' => [
            \MSBios\Guard\Provider\RuleProvider::class => [
                'allow' => [
                    [['DEVELOPER'], Controller\TemplateController::class],
                ],
                'deny' => []
            ]
        ],
    ],
];
