<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Table;

use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Tables;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\Sql\Select;

/**
 * Class DocumentTableGateway
 * @package MSBios\Document\Resource\Table
 */
class DocumentTableGateway extends AbstractResource
{
    /**
     * @param Document $document
     * @return mixed
     */
    public function fetchAllByDocument(Document $document)
    {
        return $this->tableGateway->select([
            'parentid' => $document['id']
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
                    sprintf('d.id = %s.parentid', Tables::CNT_T_DOCUMENTS),
                    ['aid' => 'id', 'ancestor' => 'uri'],
                    Select::JOIN_LEFT
                );
                $select->join(
                    ['l' => Tables::SYS_T_TEMPLATES],
                    sprintf('l.id = %s.layoutid', Tables::CNT_T_DOCUMENTS),
                    ['layout' => 'identifier'],
                    Select::JOIN_LEFT
                );
                $select->join(
                    ['v' => Tables::SYS_T_TEMPLATES],
                    sprintf('v.id = %s.viewid', Tables::CNT_T_DOCUMENTS),
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
}
