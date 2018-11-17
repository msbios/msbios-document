<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Document\Terminal;

return [
    'controllers' => [
        'invokables' => [
            // Invokables
            Controller\TemplateController::class => Controller\TemplateController::class
        ],
        'factories' => [
            // Controller\IndexController::class => Factory\IndexControllerFactory::class,
        ]
    ],
    'console' => [
        'router' => [
            'routes' => [
                'console.templates' => [
                    'type' => 'simple',  // This is the default, and may be omitted; more on
                    // types below
                    'options' => [
                        'route' => 'templates',
                        'defaults' => [
                            'controller' => Controller\TemplateController::class,
                            'action' => 'index',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
