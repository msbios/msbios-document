<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Record\DocumentType;
use Kubnete\Resource\Record\Tab;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;

/**
 * Class TabTable
 * @package Kubnete\Resource\Table
 */
class Tab extends AbstractResource
{
    /**
     * @param DocumentType $objRow
     * @return ResultSet
     */
    public function fetchByDocumentType(DocumentType $objRow)
    {
        return $this->tableGateway->select(function(Select $objSelect) use ($objRow) {
            $objSelect->where([
                'document_type_id' => $objRow['id']
            ]);
            $objSelect->order("order_in ASC");
        });
    }

    /**
     * @param $id
     * @return \Zend\Stdlib\ArrayObject
     */
    public function getTab($id)
    {
        return $this->find($id);
    }

    /**
     * @param Tab $row
     * @throws \Exception
     */
    public function save(Tab $row)
    {
        /** @var array $data */
        $data = [
            'document_type_id' => $row['document_type_id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'order_in' => $row['order_in']
        ];

        /** @var int $id */
        $id = (int) $row['id'];

        if (! $id) {
            $this->getTableGateway()
                ->insert($data);
        } else {
            if ($this->getTab($id)) {
                $this->getTableGateway()
                    ->update($data, ['id' => $id]);
            } else {
                throw new \Exception('Tab id does not exist');
            }
        }
    }

//
//    /**
//     * @param $id
//     */
//    public function deleteDocumentType($id)
//    {
//        $this->delete($id);
//    }
}
