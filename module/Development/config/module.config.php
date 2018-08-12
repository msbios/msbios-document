<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Development;

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
            'backend' => [
                'child_routes' => [
                    'development' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => 'development[/]',
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'document-type' => [
                                'type' => \Zend\Router\Http\Segment::class,
                                'options' => [
                                    'route' => 'document-type[/]',
                                    'defaults' => [
                                        'controller' => Controller\DocumentTypeController::class,
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
                                            'constraints' => [
                                                'id' => '[0-9]+',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                    'delete' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => '/delete/:id[.html]',
                                            'defaults' => [
                                                'action' => 'delete',
                                            ],
                                            'constraints' => [
                                                'id' => '[0-9]+',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                ],
                            ],
                            'template' => [
                                'type' => \Zend\Router\Http\Segment::class,
                                'options' => [
                                    'route' => 'template[/]',
                                    'defaults' => [
                                        'controller' => Controller\TemplateController::class,
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
                                            'route' => '/delete/:id[.html]',
                                            'defaults' => [
                                                'action' => 'delete',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                ],
                            ],
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
            'template' => './data/KubneteCMS/templates'
        ],
    ],

    'navigation' => [
        'default' => [
            'development' => [
                'label' => 'Development',
                'uri' => '/uri',
                'class' => 'icon-design position-left',
                'order' => 400,
                'pages' => [
                    'document-type' => [
                        'label' => 'Document type',
                        'title' => 'List of Document types',
                        'route' => 'backend/development/document-type',
                        'order' => 0,
                        'class' => 'icon-file-empty2 position-left',
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new document type',
                                'route' => 'backend/development/document-type/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected document type',
                                'route' => 'backend/development/document-type/edit',
                            ]
                        ]
                    ],
                    'template' => [
                        'label' => 'Template',
                        'title' => 'List of Templates',
                        'route' => 'backend/development/template',
                        'order' => 200,
                        'class' => 'icon-insert-template position-left',
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new template',
                                'route' => 'backend/development/template/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected template',
                                'route' => 'backend/development/template/edit',
                            ]
                        ]
                    ],
                    'script' => [
                        'label' => 'Script',
                        'uri' => '/uri',
                        'order' => 400,
                        'class' => 'icon-qrcode position-left'
                    ],
                    'datatype' => [
                        'label' => 'Datatypes',
                        'title' => 'List of Data types',
                        'route' => 'backend/development/data-type',
                        'order' => 600,
                        'class' => 'icon-drive position-left',
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new data type',
                                'route' => 'backend/development/data-type/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected data type',
                                'route' => 'backend/development/data-type/edit',
                            ]
                        ]
                    ],
                ],
            ],
        ],
    ],
];
