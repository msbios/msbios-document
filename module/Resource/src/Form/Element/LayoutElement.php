<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Form\Element;

use Kubnete\Resource\Table\TemplateTable;
use Zend\Form\Element\Select;

/**
 * Class LayoutElement
 * @package Kubnete\Resource\Form\Element
 */
class LayoutElement extends Select
{
    /**
     * LayoutElement constructor.
     * @param TemplateTable $objTable
     * @param array|string $strName
     * @param array $arrOptions
     */
    public function __construct(
        TemplateTable $objTable,
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
