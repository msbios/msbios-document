<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Table;

use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use MSBios\Resource\RecordRepository;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Paginator\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

/**
 * Class DocumentTypeTableGateway
 * @package MSBios\Document\Resource\Table
 */
class DocumentTypeTableGateway extends RecordRepository
{
    ///**
    // * @param null $where
    // * @param null $order
    // * @param null $group
    // * @param null $having
    // * @return Paginator
    // */
    //public function fetchAll($where = null, $order = null, $group = null, $having = null)
    //{
    //    /** @var TableGatewayInterface|TableGateway $tableGateway */
    //    $tableGateway = $this->tableGateway;
    //
    //    /** @var Sql $sql */
    //    $sql = $tableGateway->getSql();
    //
    //    /** @var Select $select */
    //    $select = $sql->select();
    //    $select->join(
    //        ['t' => 'sys_t_templates'],
    //        'dev_t_document_types.templateid = t.id',
    //        ['view' => 'name'],
    //        Select::JOIN_LEFT
    //    );
    //
    //    if ($where) {
    //        $select->where($where);
    //    }
    //
    //    if ($order) {
    //        $select->order($order);
    //    }
    //
    //    if ($group) {
    //        $select->group($group);
    //    }
    //
    //    if ($having) {
    //        $select->having($having);
    //    }
    //
    //    /** @var AdapterInterface $adapter */
    //    $adapter = new DbSelect($select, $sql);
    //    return new Paginator($adapter);
    //}

}
