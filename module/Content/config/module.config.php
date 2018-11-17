<?php
/**
 * @access protected
 * @author
 */

namespace Kubnete\Content;

use Zend\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\DocumentController::class =>
                Factory\DocumentControllerFactory::class
        ]
    ],

    'form_elements' => [
        'factories' => [
            Form\DocumentForm::class =>
                Factory\DocumentFormFactory::class
        ]
    ],

    'router' => [
        'routes' => [
            'cpanel' => [
                'child_routes' => [
                    'content' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'content[/]',
                            'defaults' => [
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'document' => [
                                'type' => Segment::class,
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
                                        'type' => Segment::class,
                                        'options' => [
                                            'route' => 'add[.html]',
                                            'defaults' => [
                                                'action' => 'add',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                    'edit' => [
                                        'type' => Segment::class,
                                        'options' => [
                                            'route' => 'edit/:id[.html]',
                                            'defaults' => [
                                                'action' => 'edit',
                                            ],
                                        ],
                                        'may_terminate' => true
                                    ],
                                    'delete' => [
                                        'type' => Segment::class,
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
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],

    'navigation' => [
        \MSBios\CPanel\Navigation\Sidebar::class => [
            'content' => [
                'label' => 'Content',
                'route' => 'cpanel/content',
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
                        'route' => 'cpanel/content/document',
                        'class' => 'icon-files-empty position-left',
                        'order' => 400,
                        'pages' => [
                            [
                                'label' => 'Add',
                                'title' => 'To create a new document type',
                                'route' => 'cpanel/content/document/add',
                            ], [
                                'label' => 'Edit',
                                'title' => 'Edit the selected document',
                                'route' => 'cpanel/content/document/edit',
                            ]
                        ]
                    ],
                ]
            ],
        ]
    ]
];
