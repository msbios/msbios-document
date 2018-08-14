<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Kubnete\Resource\Table;

use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\DocumentType;

/**
 * Class DocumentTypeTableGateway
 * @package Kubnete\Resource\Table
 */
class DocumentTypeTableGateway extends AbstractResourceTable
{
    /**
     * @param $id
     * @return \Zend\Stdlib\ArrayObject
     */
    public function getDocumentType($id)
    {
        return $this->find($id);
    }

    /**
     * @param DocumentType $row
     * @throws \Exception
     */
    public function save(DocumentType $row)
    {
        /** @var array $data */
        $data = [
            'name' => $row['name'],
            'description' => $row['description']
        ];

        /** @var int $id */
        $id = (int) $row['id'];

        if (! $id) {
            $this->getTableGateway()
                ->insert($data);
        } else {
            if ($this->getDocumentType($id)) {
                $this->getTableGateway()
                    ->update($data, ['id' => $id]);
            } else {
                throw new \Exception('Document type id does not exist');
            }
        }
    }

    /**
     * @param $id
     */
    public function deleteDocumentType($id)
    {
        $this->delete($id);
    }

    /**
     * @param Document $objRow
     * @return \Zend\Stdlib\ArrayObject
     */
    public function findDocumentTypeByDocument(Document $objRow)
    {
        return $this->getDocumentType($objRow['document_type_id']);
    }
}
