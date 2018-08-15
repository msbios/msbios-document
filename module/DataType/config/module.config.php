<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\DataType;

use Zend\Form\Element;

return [
    Module::class => [
        'textfield' => [
            'name' => 'Textfield',
            'description' => 'Textfield',
            'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
            'date' => 2017,
            'version' => '0.0.1',
            'factory' => Element\Text::class
        ],
        'textarea' => [
            'name' => 'Textarea',
            'description' => 'Textarea',
            'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
            'date' => 2017,
            'version' => '0.0.1',
            'factory' => Element\Textarea::class
        ],
        'file' => [
            'name' => 'File',
            'description' => 'File',
            'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
            'date' => 2017,
            'version' => '0.0.1',
            'factory' => Element\File::class
        ]
    ],

    'form_elements' => [
        'factories' => [
            Form\Element\Select::class =>
                Factory\SelectFactory::class
        ],
    ],

    'service_manager' => [
        'factories' => [
            Module::class =>
                Factory\ModuleFactory::class
        ]
    ]
];
