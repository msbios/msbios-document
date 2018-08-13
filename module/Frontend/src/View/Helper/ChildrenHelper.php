<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 1/22/17
 * Time: 12:23 AM
 */

namespace Kubnete\Frontend\View\Helper;

use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Table\DocumentTable;
use Zend\View\Helper\AbstractHelper;

/**
 * Class ChildrenHelper
 * @package Kubnete\Frontend\View\Helper
 */
class ChildrenHelper extends DocumentHelper
{
    protected $table;

    /**
     * ChildrenHelper constructor.
     * @param DocumentTable $table
     * @param Document $document
     */
    public function __construct(DocumentTable $table, Document $document)
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
