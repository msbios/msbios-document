<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Tables;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Select;

/**
 * Class PropertyValueTable
 * @package Kubnete\Resource\Table
 */
class PropertyValueTable extends AbstractResource
{
//    /**
//     * @param $intId
//     * @return \Zend\Stdlib\ArrayObject
//     */
//    private function getValue($intId)
//    {
//        return $this->find($intId);
//    }
//
//    /**
//     * @param Document $document
//     * @return ResultSet
//     */
//    public function fetchByDocument(Document $document)
//    {
//        /** @var ResultSet $resultSet */
//        $resultSet = $this->getTableGateway()
//            ->select(function (Select $select) use ($document) {
//
//                $select->join(
//                    ['p' => Tables::DOC_T_PROPERTIES],
//                    sprintf("p.id = %s.property_id", Tables::DOC_T_PROPERTY_VALUES),
//                    ['property' => 'identifier']
//                );
//
//            /** @var Predicate $predicate */
//                $predicate = new Predicate;
//                $predicate->equalTo(
//                    sprintf("%s.document_id", Tables::DOC_T_PROPERTY_VALUES),
//                    $document['id']
//                );
//                $select->where($predicate);
//            });
//
//        return $resultSet;
//    }
//
//    /**
//     * @param Value $objRow
//     * @throws \Exception
//     */
//    public function save(Value $objRow)
//    {
//        /** @var array $arrData */
//        $arrData = [
//            'document_id' => $objRow['document_id'],
//            'property_id' => $objRow['property_id'],
//            'value' => $objRow['value']
//        ];
//
//        /** @var int $intId */
//        $intId = (int) $objRow['id'];
//
//        if (! $intId) {
//            $this->getTableGateway()
//                ->insert($arrData);
//        } else {
//            if ($this->getValue($intId)) {
//                $this->getTableGateway()
//                    ->update($arrData, ['id' => $intId]);
//            } else {
//                throw new \Exception('Value id does not exist');
//            }
//        }
//    }
}
