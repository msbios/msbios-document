<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 1/22/17
 * Time: 12:23 AM
 */

namespace MSBios\Document\Frontend\View\Helper;

use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Table\DocumentTableGateway;
use Zend\View\Helper\AbstractHelper;

/**
 * Class ChildrenHelper
 * @package MSBios\Document\Frontend\View\Helper
 */
class ChildrenHelper extends DocumentHelper
{
    protected $table;

    /**
     * ChildrenHelper constructor.
     * @param DocumentTableGateway $table
     * @param Document $document
     */
    public function __construct(DocumentTableGateway $table, Document $document)
    {
        parent::__construct($document);
        $this->table = $table;
    }

    /**
     * @param Document|null $document
     * @param bool $paginated
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function __invoke(Document $document = null, $paginated = false)
    {
        if (! $document) {
            /** @var Document $document */
            $document = parent::__invoke();
        }

        return $this->table->fetchAllByDocument($document);
    }
}
