<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Table;

use MSBios\Document\Resource\Form\Element\TemplateTypeElement;
use MSBios\Resource\RecordRepository;
use Zend\Db\ResultSet\ResultSet;

/**
 * Class TemplateTableGateway
 * @package MSBios\Document\Resource\Table
 */
class TemplateTableGateway extends RecordRepository
{
    /**
     * @param $type
     * @return ResultSet
     */
    protected function fetchByType($type)
    {
        return $this->tableGateway->select([
            'type' => $type
        ]);
    }

    /**
     * @return ResultSet
     */
    public function fetchViews()
    {
        return $this->fetchByType(TemplateTypeElement::VIEW);
    }

    /**
     * @return ResultSet
     */
    public function fetchLayouts()
    {
        return $this->fetchByType(TemplateTypeElement::LAYOUT);
    }
}
