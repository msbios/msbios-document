<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\DataType;

use Zend\Form\Element;

return [

    Module::class => [ // Module config
        'data-types' => [ // registered datatypes
            'textfield' => [
                'description' => 'Textfield',
                'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
                'date' => 2017,
                'version' => '0.0.1',
                'service' => Element\Text::class
            ],
            'textarea' => [
                'description' => 'Textarea',
                'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
                'date' => 2017,
                'version' => '0.0.1',
                'service' => Element\Textarea::class
            ],
            'file' => [
                'description' => 'File',
                'author' => 'Judzhin Miles <info[woof-woof]msbios.com>',
                'date' => 2017,
                'version' => '0.0.1',
                'service' => Element\File::class
            ]
        ]
    ],

    'form_elements' => [
        'factories' => [
            Form\Element\DataTypeExtensionElement::class => Factory\DataTypeSelectFactory::class
        ],
    ],

    'service_manager' => [
        'factories' => [
            Module::class => Factory\ModuleFactory::class
        ]
    ]
];
