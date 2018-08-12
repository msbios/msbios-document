<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Form\Element;

use Kubnete\Resource\Table\DataTypeTable;
use Zend\Form\Element\Select;

/**
 * Class DataTypeElement
 * @package Kubnete\Resource\Form\Element
 */
class DataTypeElement extends Select
{
    /**
     * DataTypeElement constructor.
     * @param DataTypeTable $table
     * @param array|string $name
     * @param array $options
     */
    public function __construct(DataTypeTable $table, $name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);

        foreach ($table->fetchAll() as $row) {
            $this->valueOptions[$row['id']] = $row['name'];
        }
    }
}