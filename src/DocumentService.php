<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document;

use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Table\PropertyValueTableGateway;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayObject;

/**
 * Class DocumentService
 * @package MSBios\Document
 */
class DocumentService implements DocumentServiceInterface
{

    /** @var ArrayObject */
    protected $document;

    /**
     * DocumentService constructor.
     * @param ArrayObject|null $document
     */
    public function __construct(ArrayObject $document = null)
    {
        $this->document = $document;
    }

    /**
     * @return bool
     */
    public function hasDocument()
    {
        return $this->document instanceof ArrayObject;
    }

    /**
     * @return array
     */
    public function getVariables()
    {
        /** @var array $variables */
        $variables = [];

        /** @var Paginator $paginator */
        $paginator = $this->propertyValueRepository->fetchAll(['document_id' => 5]);

        /** @var Value $record */
        foreach ($paginator as $record) {

            /** @var mixed $value */
            $value = $record['value'];

            if ($this->isSerialized($value)) {
                $value = unserialize($value);
            }

            $variables[] = $value;

        }

        return $variables;
    }

    /**
     * Defined is can unserialize string
     *
     * @param $value
     * @return bool
     */
    protected function isSerialized($value)
    {
        if (trim($value) == '') {
            return false;
        }

        if (preg_match('/^(i|s|a|o|d|N)(.*);/si', $value)) {
            return true;
        }

        return false;
    }
}