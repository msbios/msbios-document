<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Exception\RowNotFoundException;
use Kubnete\Resource\Record\DataType;
use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Template;
use Kubnete\Resource\Views;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Debug\Debug;

/**
 * Class DataTypeTable
 * @package Kubnete\Resource\Table
 */
class DataType extends AbstractResource
{
    /**
     * @param $id
     * @return \Zend\Stdlib\ArrayObject
     */
    public function getDataType($id)
    {
        return $this->find($id);
    }

    /**
     * @param DataType $row
     * @throws \Exception
     */
    public function save(DataType $row)
    {
        /** @var array $data */
        $data = [
            'name' => $row['name'],
            'form_element' => $row['form_element']
        ];

        /** @var int $id */
        $id = (int) $row['id'];

        if (! $id) {
            $this->getTableGateway()
                ->insert($data);
        } else {
            if ($this->getDataType($id)) {
                $this->getTableGateway()
                    ->update($data, ['id' => $id]);
            } else {
                throw new \Exception('Data type id does not exist');
            }
        }
    }

    /**
     * @param $id
     */
    public function deleteDataType($id)
    {
        $this->delete($id);
    }
}
