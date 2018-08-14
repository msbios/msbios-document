<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Exception\RowNotFoundException;
use MSBios\Db\TableGateway\TableGatewayInterface;
use MSBios\Resource\RecordRepository;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbTableGateway as TableGatewayPaginator;
use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayObject;

/**
 * Class AbstractResourceTable
 * @package Kubnete\Resource\Table
 */
abstract class AbstractResource extends RecordRepository
{
//    /** @var TableGateway */
//    protected $tableGateway;
//
//    /**
//     * AbstractResourceTable constructor.
//     * @param TableGateway $tableGateway
//     */
//    public function __construct(TableGateway $tableGateway)
//    {
//        $this->tableGateway = $tableGateway;
//    }
//
//    /**
//     * @param $id
//     * @return ArrayObject
//     * @throws RowNotFoundException
//     */
//    public function fetch($id)
//    {
//        /** @var int $id */
//        $id = (int)$id;
//
//        /** @var ResultSet $resultSet */
//        $resultSet = $this
//            ->tableGateway
//            ->select(['id' => $id]);
//
//        /** @var ArrayObject $row */
//        $row = $resultSet->current();
//
//        if (!$row) {
//            throw new RowNotFoundException("Could not find row {$id}");
//        }
//
//        return $row;
//    }
//
//    /**
//     * @param array $data
//     * @return Paginator
//     */
//    public function fetchAll($data = [])
//    {
//        /** @var TableGatewayInterface $tableGateway */
//        $tableGateway = $this->tableGateway;
//
//        /** @var AdapterInterface $adapter */
//        $adapter = new TableGatewayPaginator(
//            new TableGateway(
//                $tableGateway->table,
//                $tableGateway->getAdapter(),
//                null,
//                $tableGateway->getResultSetPrototype()
//            )
//        );
//
//        return new Paginator($adapter);
//    }
//
//    /**
//     * @param ArrayObject $object
//     * @return int
//     * @throws \Exception
//     */
//    public function save(ArrayObject $object)
//    {
//        /** @var array $data */
//        $data = $object->getArrayCopy();
//
//        /** @var int $id */
//        $id = (int)$object['id'];
//
//        if (!$id) {
//            return $this->tableGateway
//                ->insert($data);
//        }
//
//        try {
//            if ($this->fetch($id)) {
//                $this->tableGateway
//                    ->update($data, ['id' => $id]);
//            }
//        } catch (RowNotFoundException $exception) {
//            throw new \Exception('Row with id does not exist!');
//        }
//    }
//
//    /**
//     * @param $id
//     * @return int
//     */
//    public function delete($id)
//    {
//        return $this->tableGateway
//            ->delete(['id' => (int)$id]);
//    }
}