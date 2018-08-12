<?php
/**
 * This source file is part of Kubnete.
 *
 * Kubnete is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Kubnete is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.6
 *
 * @category Kubnete
 * @package Kubnete\Development\Form
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 * @license GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link http://msbios.com
 */
namespace Kubnete\Development\Form;

use Kubnete\Development\Form\TypeTab\PropertyFieldset;
use Kubnete\Resource\Model\Tab;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\Hydrator\ArraySerializable;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

/**
 * Class TypeTabFieldset
 * @package Kubnete\Development\Form
 */
class TypeTabFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * TypeTabFieldset constructor.
     * @param PropertyFieldset $propertyFieldset
     * @param array|string $name
     * @param array $options
     */
    public function __construct(
        PropertyFieldset $propertyFieldset,
        $name = __CLASS__,
        array $options = []
    ) {

        parent::__construct($name, $options);

        $this->setHydrator(new ArraySerializable)
            ->setObject(new Tab);

        $this->add([
            'type' => Hidden::class,
            'name' => 'id'
        ]);

        $this->add([
            'type' => Hidden::class,
            'name' => 'document_type_id'
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'name'
        ]);

        $this->add([
            'type' => Text::class,
            'name' => 'description'
        ]);

        $this->add([
            'type' => Hidden::class,
            'name' => 'order_in'
        ]);

        $this->add([
            'type' => Collection::class,
            'name' => 'properties',
            'options' => [
                'should_create_template' => false,
                'allow_add' => true,
                'allow_remove' => true,
                'count' => 0,
                'target_element' => $propertyFieldset,
            ],
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
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 200,
                        ],
                    ], [
                        'name' => NotEmpty::class
                    ]
                ],
            ],
            'description' => [
                'required' => true,
            ],
        ];
    }
}
