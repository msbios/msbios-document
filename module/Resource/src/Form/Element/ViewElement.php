<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Form\Element;

use MSBios\Document\Resource\Table\TemplateTableGateway;
use Zend\Form\Element\Select;

/**
 * Class ViewElement
 * @package MSBios\Document\Resource\Form\Element
 */
class ViewElement extends Select
{
    /**
     * ViewElement constructor.
     * @param TemplateTableGateway $table
     * @param array|string $name
     * @param array $options
     */
    public function __construct(TemplateTableGateway $table, $name = __CLASS__, array $options = [])
    {
        parent::__construct($name, $options);

        foreach ($table->fetchViews() as $row) {
            $this->valueOptions[$row['id']] = $row['name'];
        }
    }
}
