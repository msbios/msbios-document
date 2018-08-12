<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Exception\RowNotFoundException;
use Kubnete\Resource\Form\Element\TemplateTypeElement;
use Kubnete\Resource\Model\Document;
use Kubnete\Resource\Model\Template;
use Kubnete\Resource\Views;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Debug\Debug;

/**
 * Class TemplateTable
 * @package Kubnete\Resource\Table
 */
class TemplateTable extends AbstractResourceTable
{
    /**
     * @param $id
     * @return \Zend\Stdlib\ArrayObject
     */
    public function getTemplate($id)
    {
        return $this->find($id);
    }

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

    /**
     * @param Template $template
     * @throws \Exception
     */
    public function save(Template $template)
    {
        /** @var array $data */
        $data = [
            'type' => $template['type'],
            'identifier' => $template['identifier'],
            'name' => $template['name'],
            'description' => $template['description'],
        ];

        /** @var int $id */
        $id = (int) $template['id'];

        if (! $id) {
            $this->getTableGateway()
                ->insert($data);
        } else {
            if ($this->getTemplate($id)) {
                $this->getTableGateway()
                    ->update($data, ['id' => $id]);
            } else {
                throw new \Exception('Document id does not exist');
            }
        }
    }
}
