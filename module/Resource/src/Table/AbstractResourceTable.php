<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Exception\RowNotFoundException;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\ArrayObject;

/**
 * Class AbstractResourceTable
 * @package Kubnete\Resource\Table
 */
abstract class AbstractResourceTable
{
    /** @var TableGateway */
    protected $tableGateway;

    /**
     * AbstractResourceTable constructor.
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @return TableGateway
     */
    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    /**
     * @param $id
     * @return ArrayObject
     * @throws RowNotFoundException
     */
    protected function find($id)
    {

        /** @var int $id */
        $id = (int) $id;

        /** @var ResultSet $resultSet */
        $resultSet = $this->getTableGateway()->select(['id' => $id]);

        /** @var ArrayObject $row */
        $row = $resultSet->current();

        if (! $row) {
            throw new RowNotFoundException("Could not find row {$id}");
        }

        return $row;
    }

    /**
     * @return ResultSet
     */
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    /**
     * @param $id
     */
    protected function delete($id)
    {
        $this->tableGateway
            ->delete(['id' => (int) $id]);
    }
}
