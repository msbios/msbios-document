<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Form\Element;

use MSBios\Document\Resource\Table\TemplateTableGateway;
use Zend\Form\Element\Select;

/**
 * Class LayoutElement
 * @package MSBios\Document\Resource\Form\Element
 */
class LayoutElement extends Select
{
    /**
     * LayoutElement constructor.
     * @param TemplateTableGateway $objTable
     * @param array|string $strName
     * @param array $arrOptions
     */
    public function __construct(
        TemplateTableGateway $objTable,
        $strName = __CLASS__,
        array $arrOptions = []
    ) {

        parent::__construct($strName, $arrOptions);
        $this->setEmptyOption('Please choose your layout or leave empty');
        foreach ($objTable->fetchLayouts() as $objRow) {
            $this->valueOptions[$objRow['id']] = $objRow['name'];
        }
    }
}
