<?php
/**
 * @access protected
 * @author
 */
namespace Kubnete\Resource;

return [
    'service_manager' => [
        'factories' => [
            // \Zend\Db\Adapter\AdapterInterface::class => Db\Adapter\AdapterServiceFactory::class,

            Table\DataType::class => Factory\DataTypeTableFactory::class,
            Table\DocumentTableGateway::class => Factory\DocumentTableFactory::class,
            Table\DocumentTypeTableGateway::class =>
                Factory\DocumentTypeTableGatewayFactory::class,
            Table\Property::class => Factory\PropertyTableFactory::class,
            Table\PropertyValueTable::class => Factory\PropertyValueTableFactory::class,
            Table\Tab::class => Factory\TabTableFactory::class,
            Table\TemplateTableGateway::class => Factory\TemplateTableGatewayFactory::class,
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
