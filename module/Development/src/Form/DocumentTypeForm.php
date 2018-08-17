<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Development\Form;

use Kubnete\Development\Form\Element\ViewSelect;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\Form\Form;

/**
 * Class DocumentTypeForm
 * @package Kubnete\Development\Form
 */
class DocumentTypeForm extends Form
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ])->add([
            'name' => 'name',
            'type' => Text::class,
        ])->add([
            'name' => 'description',
            'type' => Text::class,
        ])->add([
            'name' => 'templateid',
            'type' => ViewSelect::class,
        ])->add([
            'name' => 'templates',
            'type' => ViewSelect::class,
            'attributes' => [
                'multiple' => 'multiple',
            ],
        ])->add([
            'type' => Collection::class,
            'name' => 'tabs',
            'options' => [
                'should_create_template' => false,
                'allow_add' => true,
                'allow_remove' => true,
                'count' => 0,
                'target_element' => [
                    'type' => Fieldset::class,
                    'elements' => [
                        [
                            'spec' => [
                                'type' => Text::class,
                                'name' => 'id'
                            ]
                        ], [
                            'spec' => [
                                'type' => Text::class,
                                'name' => 'documenttypeid'
                            ]
                        ], [
                            'spec' => [
                                'type' => Text::class,
                                'name' => 'name'
                            ]
                        ], [
                            'spec' => [
                                'type' => Text::class,
                                'name' => 'description'
                            ]
                        ], [
                            'spec' => [
                                'type' => Text::class,
                                'name' => 'orderkey'
                            ]
                        ]
                    ]
                ]
            ],
        ]);
    }
}