<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 19.01.17
 * Time: 12:08
 */

namespace Kubnete\Development\Form;

use Kubnete\DataType\Form\Element\DataTypeExtensionElement;
use Kubnete\Resource\Form\Element\TemplateTypeElement;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
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
     * @param DataTypeExtensionElement $dataTypeId
     * @param array|string $name
     * @param array|null $options
     */
    public function __construct(DataTypeExtensionElement $dataTypeId, $name = __CLASS__, array $options = null)
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);

        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Name',
                'label_attributes' => [
                    'class'  => 'control-label'
                ],
            ]
        ]);

        $dataTypeId->setName('form_element');
        $dataTypeId->setOptions(['label' => 'Element']);
        $this->add($dataTypeId);
    }
}
