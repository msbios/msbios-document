<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 1/22/17
 * Time: 12:23 AM
 */

namespace Kubnete\Frontend\View\Helper;

use Kubnete\Resource\Record\Document;
use Zend\View\Helper\AbstractHelper;

/**
 * Class DocumentHelper
 * @package Kubnete\Frontend\View\Helper
 */
class DocumentHelper extends AbstractHelper
{
    /** @var  Document */
    protected $document;

    /**
     * DocumentHelper constructor.
     * @param $document
     */
    public function __construct($document)
    {
        $this->document = $document;
    }

    /**
     * @return Document|null
     */
    public function __invoke()
    {
        if ($this->document instanceof Document) {
            return $this->document;
        }

        return null;
    }
}
