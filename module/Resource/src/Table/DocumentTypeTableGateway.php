<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Table;

use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Paginator\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

/**
 * Class DocumentTypeTableGateway
 * @package MSBios\Document\Resource\Table
 */
class DocumentTypeTableGateway extends AbstractResource
{
    /**
     * @param null $where
     * @param null $order
     * @param null $group
     * @param null $having
     * @return Paginator
     */
    public function fetchAll($where = null, $order = null, $group = null, $having = null)
    {
        /** @var TableGatewayInterface|TableGateway $tableGateway */
        $tableGateway = $this->tableGateway;

        /** @var Sql $sql */
        $sql = $tableGateway->getSql();

        /** @var Select $select */
        $select = $sql->select();
        $select->join(
            ['t' => 'sys_t_templates'],
            'dev_t_document_types.templateid = t.id',
            ['view' => 'name'],
            Select::JOIN_LEFT
        );

        if ($where) {
            $select->where($where);
        }

        if ($order) {
            $select->order($order);
        }

        if ($group) {
            $select->group($group);
        }

        if ($having) {
            $select->having($having);
        }

        /** @var AdapterInterface $adapter */
        $adapter = new DbSelect($select, $sql);
        return new Paginator($adapter);
    }



    ///**
    // * @param $id
    // * @return \Zend\Stdlib\ArrayObject
    // */
    //public function getDocumentType($id)
    //{
    //    return $this->find($id);
    //}
    //
    ///**
    // * @param DocumentType $row
    // * @throws \Exception
    // */
    //public function save(DocumentType $row)
    //{
    //    /** @var array $data */
    //    $data = [
    //        'name' => $row['name'],
    //        'description' => $row['description']
    //    ];
    //
    //    /** @var int $id */
    //    $id = (int) $row['id'];
    //
    //    if (! $id) {
    //        $this->getTableGateway()
    //            ->insert($data);
    //    } else {
    //        if ($this->getDocumentType($id)) {
    //            $this->getTableGateway()
    //                ->update($data, ['id' => $id]);
    //        } else {
    //            throw new \Exception('Document type id does not exist');
    //        }
    //    }
    //}
    //
    // /**
    //  * @param $id
    //  */
    // public function deleteDocumentType($id)
    // {
    //     $this->delete($id);
    // }
    //
    // /**
    //  * @param Document $objRow
    //  * @return \Zend\Stdlib\ArrayObject
    //  */
    // public function findDocumentTypeByDocument(Document $objRow)
    // {
    //     return $this->getDocumentType($objRow['document_type_id']);
    // }
}
