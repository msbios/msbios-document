<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Form\Element;

use Kubnete\Resource\Table\TemplateTable;
use Zend\Form\Element\Select;

/**
 * Class ViewElement
 * @package Kubnete\Resource\Form\Element
 */
class ViewElement extends Select
{
    /**
     * ViewElement constructor.
     * @param TemplateTable $table
     * @param array|string $name
     * @param array $options
     */
    public function __construct(TemplateTable $table, $name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);

        foreach ($table->fetchViews() as $row) {
            $this->valueOptions[$row['id']] = $row['name'];
        }
    }
}