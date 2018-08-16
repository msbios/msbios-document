<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Development\Form;

use Kubnete\Development\Form\Element\ViewSelect;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * Class DocumentTypeForm
 * @package Kubnete\Development\Form
 */
class DocumentTypeForm extends Form
{
//    /**
//     * DocumentTypeForm constructor.
//     * @param int|null|string $name
//     * @param array|null $options
//     */
//    public function __construct($name = __CLASS__, array $options = null)
//    {
//
//        parent::__construct($name, $options);
//        $this->setAttribute('method', Request::METHOD_POST);
////
//
////
////        $this->add([
////            'name' => 'description',
////            'type' => Text::class,
//////            'options' => [
//////                'label' => 'Description',
//////                'label_attributes' => [
//////                    'class'  => 'control-label'
//////                ],
//////            ]
////        ]);
////
////        $viewId->setName('default_view_id');
////        $viewId->setOptions([
////            'label' => 'Default view',
//////            'label_attributes' => [
//////                'class'  => 'control-label'
//////            ],
////        ]);
////        $this->add($viewId);
////
////        $this->add([
////            'type' => Collection::class,
////            'name' => 'tabs',
//////            'options' => [
//////                'should_create_template' => false,
//////                'allow_add' => true,
//////                'allow_remove' => true,
//////                'count' => 0,
//////                'target_element' => $typeTabFieldset,
//////            ],
////        ]);
//    }

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
            ],
        ]);
    }


}
