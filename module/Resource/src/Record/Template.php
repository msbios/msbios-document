<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Record;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArrayObject;
use Zend\Validator\Db\NoRecordExists;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;
use Zend\Validator\StringLength;

/**
 * Class Template
 * @package Kubnete\Resource\Model
 */
class Template extends ArrayObject implements InputFilterAwareInterface
{
    public $id;
    public $type;
    public $identifier;
    public $name;
    public $description;
    public $createdAt;
    public $updatedAt;

    /** @var  InputFilter */
    protected $inputFilter;

//    /**
//     * @param array|ArrayObject $data
//     */
//    public function exchangeArray($data)
//    {
//        parent::exchangeArray($data);
//
//        $this->parentId = (!isset($data['parent_id']))
//            ?: $data['parent_id'];
//
//        $this->documentTypeId = (!isset($data['document_type_id']))
//            ?: $data['document_type_id'];
//
//        $this->layoutId = (!isset($data['layout_id']))
//            ?: $data['layout_id'];
//
//        $this->viewId = (!isset($data['view_id']))
//            ?: $data['view_id'];
//    }

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
                'name' => 'identifier',
                'required' => true,
                'filters' => [
                    [
                        'name' => StripTags::class
                    ], [
                        'name' => StringTrim::class
                    ],
                ],
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 255,
                        ],
                    ], [
                        'name' => Regex::class,
                        'options' => [
                            'pattern' => '~^[a-zA-Z0-9._-]+$~'
                        ],
                    ], [
                        'name' => NoRecordExists::class,
                        'options' => [
                            'table' => 'sys_t_templates',
                            'field' => 'identifier',
                            'adapter' => GlobalAdapterFeature::getStaticAdapter(),
                            'exclude' => [
                                'field' => 'id',
                                'value' => $this['id'],
                            ],
                        ],
                    ],
                ],
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'name',
                'required' => true,
                'filters' => [
                    [
                        'name' => StripTags::class
                    ], [
                        'name' => StringTrim::class
                    ],
                ],
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'content',
                'required' => true,
                'filters' => [
                    [
                        'name' => StringTrim::class
                    ],
                ],
                'validators' => [
                    [
                        'name' => NotEmpty::class,
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
     * @param InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
}
