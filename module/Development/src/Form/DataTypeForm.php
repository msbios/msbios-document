<?php
/**
 * @access protected
 * @author Jduzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Development\Form;

use Kubnete\Development\Form\Element\FormElementSelect;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;

/**
 * Class DataTypeForm
 * @package Kubnete\Development\Form
 */
class DataTypeForm extends Form
{
    /**
     * DataTypeForm constructor.
     * @param int|null|string $name
     * @param array|null $options
     */
    public function __construct($name = __CLASS__, array $options = null)
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', Request::METHOD_POST);
    }

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
            'name' => 'form_element',
            'type' => FormElementSelect::class
        ]);
    }


}
