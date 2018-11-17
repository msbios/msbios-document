<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Record;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArrayObject;
use Zend\Validator\StringLength;

/**
 * Class DocumentType
 * @package MSBios\Document\Resource\Model
 */
class DocumentType extends ArrayObject implements InputFilterAwareInterface
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
                'name' => 'description',
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
                'name' => 'templateid',
                'required' => true
            ]));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /**
     * @param InputFilterInterface $inputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
}
