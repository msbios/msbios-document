<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Record;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArrayObject;
use Zend\Validator\StringLength;

/**
 * Class DataType
 * @package Kubnete\Resource\Model
 */
class DataType extends ArrayObject implements InputFilterAwareInterface
{
    /** @var  InputFilter */
    protected $inputFilter;

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
                'name' => 'form_element',
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