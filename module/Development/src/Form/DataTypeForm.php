<?php
/**
 * @access protected
 * @author Jduzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Development\Form;

use MSBios\Document\Development\Form\Element\FieldSelect;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * Class DataTypeForm
 * @package MSBios\Document\Development\Form
 */
class DataTypeForm extends Form
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
            'name' => 'field',
            'type' => FieldSelect::class
        ]);
    }
}
