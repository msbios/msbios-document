<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Form\Element;

use MSBios\Document\Resource\Table\DataTypeTableGateway;
use Zend\Form\Element\Select;

/**
 * Class DataTypeElement
 * @package MSBios\Document\Resource\Form\Element
 */
class DataTypeElement extends Select
{
    /**
     * DataTypeElement constructor.
     * @param DataTypeTableGateway $table
     * @param array|string $name
     * @param array $options
     */
    public function __construct(DataTypeTableGateway $table, $name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);

        foreach ($table->fetchAll() as $row) {
            $this->valueOptions[$row['id']] = $row['name'];
        }
    }
}
