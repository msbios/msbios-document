<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Resource;

return [
    'service_manager' => [
        'factories' => [
            Table\DataTypeTableGateway::class =>
                Factory\DataTypeTableGatewayFactory::class,
            Table\DocumentTableGateway::class =>
                Factory\DocumentTableFactory::class,
            Table\DocumentTypeTableGateway::class =>
                Factory\DocumentTypeTableGatewayFactory::class,
            Table\PropertyTableGateway::class =>
                Factory\PropertyTableFactory::class,
            Table\PropertyValueTableGateway::class =>
                Factory\PropertyValueTableGatewayFactory::class,
            Table\TabTableGateway::class =>
                Factory\TabTableGatewayFactory::class,
            Table\TemplateTableGateway::class =>
                Factory\TemplateTableGatewayFactory::class,
        ],
    ],

    'form_elements' => [
        'invokables' => [
            Form\Element\TemplateTypeElement::class =>
                Form\Element\TemplateTypeElement::class
        ],
        'factories' => [
            Form\Element\DataTypeElement::class =>
                Factory\DataTypeElementFactory::class,
            Form\Element\DocumentTypeElement::class =>
                Factory\DocumentTypeElementFactory::class,
            Form\Element\LayoutElement::class =>
                Factory\LayoutElementFactory::class,
            Form\Element\ViewElement::class =>
                Factory\ViewElementFactory::class
        ],
    ],
];
