<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Content;

return [

    'service_manager' => [
        'aliases' => [
            'translator' => 'MvcTranslator',
        ],
    ],

    'controllers' => [
        'invokables' => [

        ],
        'factories' => [
            Controller\DocumentController::class => Factory\DocumentControllerFactory::class
        ]
    ],

    'form_elements' => [
        'invokables' => [

        ],
        'factories' => [
            Form\DocumentForm::class => Factory\DocumentFormFactory::class
        ]
    ],

    'router' => [
        'routes' => [
            'backend' => [
                'child_routes' => [
                    'content' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => 'content[/]',
                            'defaults' => [
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'document' => [
                                'type' => \Zend\Router\Http\Segment::class,
                                'options' => [
                                    'route' => 'document[/]',
                                    'defaults' => [
                                        'controller' => Controller\DocumentController::class,
                                        'action' => 'index',
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
                                        'type' => \Zend\Router\Http\Segment::class,
                                        'options' => [
                                            'route' => 'delete/:id[.html]',
                                            'defaults' => [
                                                'action' => 'delete',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'content' => __DIR__ . '/../view',
        ],
    ],

    'navigation' => [
        'default' => [
            'content' => [
                'label' => 'Content',
                'route' => 'backend/content',
                'class' => 'icon-pencil7 position-left',
                'order' => 200,
                'pages' => [
                    'translation' => [
                        'label' => 'Translations',
                        'uri' => '/uri',
                        'class' => ' icon-earth position-left',
                        'order' => 0,
                    ],
                    'file-manager' => [
                        'label' => 'File manager',
                        'uri' => '/uri',
                        'class' => 'icon-folder-open',
                        'order' => 200,
                    ],
                    'document' => [
                        'label' => 'Document',
                        'title' => 'List of documents',
                        'route' => 'backend/content/document',
                        'class' => 'icon-files-empty position-left',
                        'order' => 400,
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new document type',
                                'route' => 'backend/content/document/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected document',
                                'route' => 'backend/content/document/edit',
                            ]
                        ]
                    ],
                ]
            ],
        ]
    ]
];