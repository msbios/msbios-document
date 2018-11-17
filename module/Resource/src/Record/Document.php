<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Record;

use MSBios\Resource\Record;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

/**
 * Class Document
 * @package MSBios\Document\Resource\Record
 */
class Document extends Record implements InputFilterAwareInterface
{

    ///**
    // * @param PropertyValueTableGateway $table
    // * @return $this
    // */
    //public function setPropertyValueTable(PropertyValueTableGateway $table)
    //{
    //    $this->table = $table;
    //    return $this;
    //}
    //
    ///**
    // * @param $identifier
    // * @param bool $single
    // * @return null
    // */
    //public function getValue($identifier, $single = true)
    //{
    //    if (is_null($this->values)) {
    //        /** @var ResultSet $resultSet */
    //        $resultSet = $this->table
    //            ->fetchByDocument($this);
    //
    //        foreach ($resultSet as $row) {
    //            $this->values[$row['property']] = $row;
    //        }
    //    }
    //
    //    if (is_array($this->values) && ! empty($this->values) && isset($this->values[$identifier])) {
    //        /** @var Value $value */
    //        $value = $this->values[$identifier];
    //        return $single ? $value['value'] : $value;
    //    }
    //
    //    return null;
    //}

    /**
     * @return InputFilter
     */
    public function getInputFilter()
    {
        if (! $this->inputFilter) {

            /** @var InputFilter $inputFilter */
            $inputFilter = new InputFilter;

            /** @var InputFactory $factory */
            $factory = new InputFactory;

            $inputFilter->add($factory->createInput([
                'name' => 'id',
                'required' => false,
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'name',
                'required' => true,
                'filters'  => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 200,
                        ],
                    ],
                ],
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'uri',
                'required' => true,
                'filters'  => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 200,
                        ],
                    ],
                ],
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'document_type_id',
                'required' => true,
                'validators' => [
                    [
                        'name' => NotEmpty::class,
                    ],
                ],
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'layout_id',
                'required' => false
            ]));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
}
