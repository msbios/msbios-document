<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Record\DocumentType;
use Kubnete\Resource\Record\Property;
use Kubnete\Resource\Record\Tab;
use Zend\Db\Sql\Select;

/**
 * Class PropertyTableGateway
 * @package Kubnete\Resource\Table
 */
class PropertyTableGateway extends AbstractResource
{
    ///**
    // * @param $id
    // * @return \Zend\Stdlib\ArrayObject
    // */
    //public function getProperty($id)
    //{
    //    return $this->find($id);
    //}
    //
    ///**
    // * @param TabTableGateway $tab
    // * @return \Zend\Db\ResultSet\ResultSet
    // */
    //public function fetchByTab(Tab $tab)
    //{
    //    return $this->tableGateway->select([
    //        'tab_id' => $tab['id']
    //    ]);
    //}
    //
    ///**
    // * @param Property $row
    // * @throws \Exception
    // */
    //public function save(Property $row)
    //{
    //    /** @var array $data */
    //    $data = [
    //        'tab_id' => $row['tab_id'],
    //        'datatype_id' => $row['datatype_id'],
    //        'name' => $row['name'],
    //        'required' => ((bool) $row['required']) ? 1 : 0,
    //        'identifier' => $row['identifier'],
    //        'description' => $row['description'],
    //        'order_in' => $row['order_in']
    //    ];
    //
    //    /** @var int $id */
    //    $id = (int) $row['id'];
    //
    //    if (! $id) {
    //        $this->getTableGateway()
    //            ->insert($data);
    //    } else {
    //        if ($this->getProperty($id)) {
    //            $this->getTableGateway()
    //                ->update($data, ['id' => $id]);
    //        } else {
    //            throw new \Exception('Property id does not exist');
    //        }
    //    }
    //}
    //
    ///**
    // * @param DocumentType $objRow
    // * @return \Zend\Db\ResultSet\ResultSet
    // */
    //public function fetchPropertyByDocumentType(DocumentType $objRow)
    //{
    //    return $this->tableGateway->select(function (Select $objSelect) use ($objRow) {
    //
    //        /** @var string $strTableName */
    //        $strTableName = $this->tableGateway->getTable();
    //
    //        $objSelect->join(
    //            ['t' => 'doc_t_tabs'],
    //            sprintf("t.id = %s.tab_id", $strTableName),
    //            []
    //        );
    //
    //        $objSelect->join(
    //            ['d' => 'sys_t_datatypes'],
    //            sprintf("d.id = %s.datatype_id", $strTableName),
    //            ['form_element']
    //        );
    //
    //        $objSelect->where(['t.document_type_id' => $objRow['id']]);
    //
    //        $objSelect->order("{$strTableName}.order_in ASC");
    //    });
    //}
}