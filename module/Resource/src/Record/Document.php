<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Record;

use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Table\PropertyValue;
use Kubnete\Resource\Table\PropertyValueTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArrayObject;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

/**
 * Class Document
 * @package Kubnete\Resource\Model
 */
class Document extends ArrayObject implements InputFilterAwareInterface
{
    public $id;
    public $parentId;
    public $documentTypeId;
    public $layoutId;
    public $viewId;
    public $name;
    public $uri;
    public $status;
    public $orderIn;
    public $inNavigation;
    public $isCached;
    public $locale;
    public $createdAt;
    public $userId;
    public $updatedAt;

    /** @var PropertyValueTable */
    protected $table;

    /** @var null */
    protected $values = null;

    /** @var  InputFilter */
    protected $inputFilter;

    /**
     * @param array|ArrayObject $data
     */
    public function exchangeArray($data)
    {
        parent::exchangeArray($data);

        $this->parentId = (! isset($data['parent_id']))
            ?: $data['parent_id'];

        $this->documentTypeId = (! isset($data['document_type_id']))
            ?: $data['document_type_id'];

        $this->layoutId = (! isset($data['layout_id']))
            ?: $data['layout_id'];

        $this->viewId = (! isset($data['view_id']))
            ?: $data['view_id'];
    }

    /**
     * @param PropertyValueTable $table
     * @return $this
     */
    public function setPropertyValueTable(PropertyValueTable $table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param $identifier
     * @param bool $single
     * @return null
     */
    public function getValue($identifier, $single = true)
    {
        if (is_null($this->values)) {
            /** @var ResultSet $resultSet */
            $resultSet = $this->table
                ->fetchByDocument($this);

            foreach ($resultSet as $row) {
                $this->values[$row['property']] = $row;
            }
        }

        if (is_array($this->values) && ! empty($this->values) && isset($this->values[$identifier])) {
            /** @var Value $value */
            $value = $this->values[$identifier];
            return $single ? $value['value'] : $value;
        }

        return null;
    }

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
