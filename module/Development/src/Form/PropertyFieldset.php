<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace Kubnete\Development\Form;

use Kubnete\Resource\Form\Element\DataTypeElement;
use Kubnete\Resource\Record\Property;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\Hydrator\ArraySerializable;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

/**
 * Class PropertyFieldset
 * @package Kubnete\Development\Form
 */
class PropertyFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * PropertyFieldset constructor.
     * @param int|null|string $name
     * @param array $options
     */
    public function __construct($name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);
        $this->setHydrator(new ArraySerializable)
            ->setObject(new Property);

        $this->add([
            'type' => Hidden::class,
            'name' => 'id'
        ])->add([
            'type' => Hidden::class,
            'name' => 'tab_id'
        ]);

        $dataTypeId->setName('datatype_id');
        $dataTypeId->setOptions([
            'label' => 'Datatype',
        ]);
        $this->add($dataTypeId);

        $this->add([
            'type' => Text::class,
            'name' => 'name',
            'options' => [
                'label' => 'Name',
            ]
        ]);

        $this->add([
            'type' => Checkbox::class,
            'name' => 'required',
            'options' => [
                'label' => 'Required',
                'checked_value' => 1,
                'unchecked_value' => 0
            ]
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'identifier',
            'options' => [
                'label' => 'Identifier',
            ]
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'description',
            'options' => [
                'label' => 'Description',
            ]
        ]);

        $this->add([
            'type' => Hidden::class,
            'name' => 'order_in'
        ]);
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'name' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 200,
                        ],
                    ],
                    [
                        'name' => NotEmpty::class
                    ]
                ],
            ],
            'identifier' => [
                'required' => true,
            ],
            'required' => [
                'required' => false,
            ],
        ];
    }
}
