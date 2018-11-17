<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Development;

use Zend\Form\Element\File;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [
        'factories' => [
            Module::class => Factory\ModuleFactory::class
        ],
    ],

    'controllers' => [
        'invokables' => [

        ],
        'factories' => [
            Controller\DataTypeController::class =>
                Factory\DataTypeControllerFactory::class,
            Controller\DocumentTypeController::class =>
                Factory\DocumentTypeControllerFactory::class,
            Controller\TemplateController::class =>
                Factory\TemplateControllerFactory::class
        ],
    ],

    'form_elements' => [

        'factories' => [
            // Elements
            Form\Element\DataTypeSelect::class =>
                Factory\DataTypeSelectFactory::class,
            Form\Element\FieldSelect::class =>
                Factory\FormElementSelectFactory::class,
            Form\Element\ViewSelect::class =>
                Factory\ViewSelectFactory::class,


            // deprecated
            Form\TypeTab\PropertyFieldset::class =>
                Factory\TypeTab\PropertyFieldsetFactory::class,

            // Forms
            Form\TemplateForm::class =>
                InvokableFactory::class,
            Form\DataTypeForm::class =>
                InvokableFactory::class,
            Form\DocumentTypeForm::class =>
                InvokableFactory::class,
            Form\TypeTabFieldset::class =>
                Factory\TypeTabFieldsetFactory::class,
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

                    //'development' => [
                    //    'type' => \Zend\Router\Http\Segment::class,
                    //    'options' => [
                    //        'route' => 'development[/]',
                    //    ],
                    //    'may_terminate' => true,
                    //    'child_routes' => [
                    //        //'document-type' => [
                    //        //    'type' => \Zend\Router\Http\Segment::class,
                    //        //    'options' => [
                    //        //        'route' => 'document-type[/]',
                    //        //        'defaults' => [
                    //        //            'controller' => Controller\DocumentTypeController::class,
                    //        //        ],
                    //        //    ],
                    //        //    'may_terminate' => true,
                    //        //    'child_routes' => [
                    //        //        'add' => [
                    //        //            'type' => \Zend\Router\Http\Segment::class,
                    //        //            'options' => [
                    //        //                'route' => 'add[.html]',
                    //        //                'defaults' => [
                    //        //                    'action' => 'add',
                    //        //                ],
                    //        //            ],
                    //        //            'may_terminate' => true
                    //        //        ],
                    //        //        'edit' => [
                    //        //            'type' => \Zend\Router\Http\Segment::class,
                    //        //            'options' => [
                    //        //                'route' => 'edit/:id[.html]',
                    //        //                'defaults' => [
                    //        //                    'action' => 'edit',
                    //        //                ],
                    //        //                'constraints' => [
                    //        //                    'id' => '[0-9]+',
                    //        //                ],
                    //        //            ],
                    //        //            'may_terminate' => true
                    //        //        ],
                    //        //        'delete' => [
                    //        //            'type' => 'Segment',
                    //        //            'options' => [
                    //        //                'route' => '/delete/:id[.html]',
                    //        //                'defaults' => [
                    //        //                    'action' => 'delete',
                    //        //                ],
                    //        //                'constraints' => [
                    //        //                    'id' => '[0-9]+',
                    //        //                ],
                    //        //            ],
                    //        //            'may_terminate' => true
                    //        //        ],
                    //        //    ],
                    //        //],
                    //        //'template' => [
                    //        //    'type' => \Zend\Router\Http\Segment::class,
                    //        //    'options' => [
                    //        //        'route' => 'template[/]',
                    //        //        'defaults' => [
                    //        //            'controller' => Controller\TemplateController::class,
                    //        //        ],
                    //        //        'constraints' => [
                    //        //            'id' => '[0-9]+',
                    //        //        ],
                    //        //    ],
                    //        //    'may_terminate' => true,
                    //        //    'child_routes' => [
                    //        //        'add' => [
                    //        //            'type' => \Zend\Router\Http\Segment::class,
                    //        //            'options' => [
                    //        //                'route' => 'add[.html]',
                    //        //                'defaults' => [
                    //        //                    'action' => 'add',
                    //        //                ],
                    //        //            ],
                    //        //            'may_terminate' => true
                    //        //        ],
                    //        //        'edit' => [
                    //        //            'type' => \Zend\Router\Http\Segment::class,
                    //        //            'options' => [
                    //        //                'route' => 'edit/:id[.html]',
                    //        //                'defaults' => [
                    //        //                    'action' => 'edit',
                    //        //                ],
                    //        //            ],
                    //        //            'may_terminate' => true
                    //        //        ],
                    //        //        'delete' => [
                    //        //            'type' => 'Segment',
                    //        //            'options' => [
                    //        //                'route' => '/delete/:id[.html]',
                    //        //                'defaults' => [
                    //        //                    'action' => 'delete',
                    //        //                ],
                    //        //            ],
                    //        //            'may_terminate' => true
                    //        //        ],
                    //        //    ],
                    //        //],
                    //        'data-type' => [
                    //            'type' => \Zend\Router\Http\Segment::class,
                    //            'options' => [
                    //                'route' => 'data-type[/]',
                    //                'defaults' => [
                    //                    'controller' => Controller\DataTypeController::class,
                    //                ],
                    //                'constraints' => [
                    //                    'id' => '[0-9]+',
                    //                ],
                    //            ],
                    //            'may_terminate' => true,
                    //            'child_routes' => [
                    //                'add' => [
                    //                    'type' => \Zend\Router\Http\Segment::class,
                    //                    'options' => [
                    //                        'route' => 'add[.html]',
                    //                        'defaults' => [
                    //                            'action' => 'add',
                    //                        ],
                    //                    ],
                    //                    'may_terminate' => true
                    //                ],
                    //                'edit' => [
                    //                    'type' => \Zend\Router\Http\Segment::class,
                    //                    'options' => [
                    //                        'route' => 'edit/:id[.html]',
                    //                        'defaults' => [
                    //                            'action' => 'edit',
                    //                        ],
                    //                    ],
                    //                    'may_terminate' => true
                    //                ],
                    //                'delete' => [
                    //                    'type' => 'Segment',
                    //                    'options' => [
                    //                        'route' => 'delete/:id[.html]',
                    //                        'defaults' => [
                    //                            'action' => 'delete',
                    //                        ]
                    //                    ],
                    //                    'may_terminate' => true
                    //                ],
                    //            ],
                    //        ],
                    //    ],
                    //],
                ]
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
            './data/MSBiosDocument/cache'
        ],
        'template_map' => [

            'kubnete/development/data-type/add' =>
                __DIR__ . '/../view/kubnete/development/data-type/form.phtml',
            'kubnete/development/data-type/edit' =>
                __DIR__ . '/../view/kubnete/development/data-type/form.phtml',

            'kubnete/development/document-type/add' =>
                __DIR__ . '/../view/kubnete/development/data-type/form.phtml',
            'kubnete/development/document-type/edit' =>
                __DIR__ . '/../view/kubnete/development/document-type/form.phtml',

            'kubnete/development/template/add' =>
                __DIR__ . '/../view/kubnete/development/template/form.phtml',
            'kubnete/development/template/edit' =>
                __DIR__ . '/../view/kubnete/development/template/form.phtml',
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
                        'label' => 'Templates',
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
                    'data-type' => [
                        'label' => 'Data types',
                        'title' => 'List of Data types',
                        'route' => 'cpanel/data-type',
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
                Controller\DocumentTypeController::class => [],
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

    Module::class => [
        'form_elements' => [
            'textfield' => [
                'name' => 'Zend\Form\Element\Text',
                'description' => 'This element automatically adds a type attribute of value text.',
                'author' => 'Zend Framework',
                'date' => 2018,
                'version' => '0.0.1',
                'factory' => Text::class
            ],
            'textarea' => [
                'name' => 'Zend\Form\Element\Textarea',
                'description' => 'This element automatically adds a type attribute of value textarea.',
                'author' => 'Zend Framework',
                'date' => 2017,
                'version' => '0.0.1',
                'factory' => Textarea::class
            ],
            'file' => [
                'name' => 'Zend\Form\Element\File',
                'description' => 'This element automatically adds a type attribute of value file. It will also set the form\'s enctype to multipart/form-data during $form->prepare().',
                'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
                'date' => 2017,
                'version' => '0.0.1',
                'factory' => File::class
            ]
        ]
    ]
];
