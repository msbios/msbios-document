<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Form\Element;

use Kubnete\Resource\Table\DocumentTypeTableGateway;
use Zend\Form\Element\Select;

/**
 * Class DocumentTypeElement
 * @package Kubnete\Resource\Form\Element
 */
class DocumentTypeElement extends Select
{
    /**
     * DocumentTypeElement constructor.
     * @param DocumentTypeTableGateway $table
     * @param array|string $name
     * @param array $options
     */
    public function __construct(DocumentTypeTableGateway $table, $name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);

        foreach ($table->fetchAll() as $row) {
            $this->valueOptions[$row['id']] = $row['name'];
        }
    }
}
