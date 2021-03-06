<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Resource\Table;

use MSBios\Document\Resource\Record\Document;
use MSBios\Resource\RecordRepository;
use Zend\Db\Sql\Select;

/**
 * Class PropertyValueTableGateway
 * @package MSBios\Document\Resource\Table
 */
class PropertyValueTableGateway extends RecordRepository
{
    /**
     * @param Document $document
     * @return mixed
     */
    public function fetchByDocument(Document $document)
    {
        return $this->tableGateway->select(function (Select $select) use ($document) {
            $select->join(
                'doc_t_properties',
                'doc_t_properties.id = doc_t_property_values.propertyid',
                ['identifier']
            );
            $select->where(['documentid' => $document['id']]);
        });
    }
}
