<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Tables;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\Sql\Select;

/**
 * Class DocumentTableGateway
 * @package Kubnete\Resource\Table
 */
class DocumentTableGateway extends AbstractResource
{
    /**
     * @param Document $document
     * @param bool $paginated
     */
    public function fetchAllByDocument(Document $document, $paginated = false)
    {
        if ($paginated) {
        }

        return $this->tableGateway->select([
            'parent_id' => $document['id']
        ]);
    }

    /**
     * @param $uri
     * @param null $ancestor
     * @return array|\ArrayObject|null
     */
    public function fetchOneByUriAndAncestor($uri, $ancestor = null)
    {
        /** @var ResultSet $resultSet */
        $resultSet = $this->tableGateway
            ->select(function (Select $select) use ($uri, $ancestor) {
                $select->join(
                    ['d' => Tables::CNT_T_DOCUMENTS],
                    sprintf('d.id = %s.parent_id', Tables::CNT_T_DOCUMENTS),
                    ['aid' => 'id', 'ancestor' => 'uri'],
                    Select::JOIN_LEFT
                );
                $select->join(
                    ['l' => Tables::SYS_T_TEMPLATES],
                    sprintf('l.id = %s.layout_id', Tables::CNT_T_DOCUMENTS),
                    ['layout' => 'identifier'],
                    Select::JOIN_LEFT
                );
                $select->join(
                    ['v' => Tables::SYS_T_TEMPLATES],
                    sprintf('v.id = %s.view_id', Tables::CNT_T_DOCUMENTS),
                    ['view' => 'identifier'],
                    Select::JOIN_LEFT
                );

                /** @var PredicateSet $predicateSet */
                $predicateSet = new PredicateSet;

                /** @var Predicate $predicate */
                $predicate = new Predicate;
                $predicate->equalTo('cnt_t_documents.uri', $uri);
                $predicateSet->addPredicate($predicate);

                if (! is_null($ancestor)) {
                    /** @var Predicate $predicate */
                    $predicate = new Predicate;
                    $predicate->equalTo('d.uri', $ancestor);
                    $predicateSet->addPredicate($predicate);
                }

                $select->where($predicateSet);
            });

        return $resultSet->current();
    }

//    /**
//     * @param Document $document
//     * @throws \Exception
//     */
//    public function save(Document $document)
//    {
//        /** @var array $data */
//        $data = [
//            'name' => $document['name'],
//            'uri' => $document['uri'],
//            'document_type_id' => $document['document_type_id']
//        ];
//
//        /** @var int $id */
//        $id = (int)$document['id'];
//
//        if (!$id) {
//            $this->getTableGateway()
//                ->insert($data);
//        } else {
//            if ($this->getDocument($id)) {
//                $this->getTableGateway()
//                    ->update($data, ['id' => $id]);
//            } else {
//                throw new \Exception('Document id does not exist');
//            }
//        }
//    }
//
//    /**
//     * @param $id
//     */
//    public function deleteDocument($id)
//    {
//        $this->delete($id);
//    }
}
