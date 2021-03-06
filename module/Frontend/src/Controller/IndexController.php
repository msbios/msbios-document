<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Frontend\Controller;

use MSBios\Document\Resource\Record\Document;
use MSBios\Document\Resource\Record\Value;
use MSBios\Document\Resource\Table\PropertyValue;
use Zend\Db\ResultSet\ResultSet;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package MSBios\Document\Frontend\Controller
 */
class IndexController extends AbstractActionController
{
    const EVENT_DOCUMENT = 'Document';
    const EVENT_DOCUMENT_POST = 'Document.Post';

    /** @var PropertyValue */
    protected $propertyValueTable;

    /** @var Document */
    protected $document = null;

    /**
     * IndexController constructor.
     * @param PropertyValue $propertyValueTable
     * @param Document|null $document
     */
    public function __construct(
        PropertyValue $propertyValueTable,
        $document
    ) {
        $this->propertyValueTable = $propertyValueTable;
        $this->document = $document;
    }

    /**
     * @return array
     */
    public function indexAction()
    {

        echo __METHOD__;
        die();

        /** @var ViewModel $viewModel */
        $viewModel = new ViewModel;

        $this->getEventManager()->trigger(
            __CLASS__,
            self::EVENT_DOCUMENT,
            $this,
            [
                'viewModel' => $viewModel
            ]
        );

        if (! $this->document && ! ($this->document instanceof Document)) {
            return $this->notFoundAction();
        }

        /** @var ResultSet $values */
        $values = $this->propertyValueTable->fetchByDocument($this->document);

        /** @var Value $value */
        foreach ($values as $value) {
            if ($this->isSerialized($value['value'])) {
                $value['value'] = unserialize($value['value']);
            }

            $viewModel->setVariable(
                $value['property'],
                $value['value']
            );
        }

        if ($this->document['layout']) {
            /** @var ViewModel $layout */
            $layout = $this->layout();
            $layout->setTemplate($this->document['layout']);
            $layout->setVariables($viewModel->getVariables());
        } else {
            $viewModel->setTerminal(true);
        }

        if ($this->document['view']) {
            $viewModel->setTemplate($this->document['view']);
        }

        if ($this->getRequest()->isXmlHttpRequest()) {
            $viewModel->setTerminal(true);
        }

        $this->getEventManager()->trigger(
            __CLASS__,
            self::EVENT_DOCUMENT_POST,
            $this,
            [
                'viewModel' => $viewModel
            ]
        );

        // Debug::dump($viewModel); die();

        return $viewModel;
    }

    /**
     * Explode path
     *
     * @param string $path Url path
     * @return array
     */
    protected function explodePath($path)
    {
        $explodePath = explode('/', $path);
        if (preg_match('/\/$/', $path)) {
            array_pop($explodePath);
        }

        return $explodePath;
    }

    /**
     * Defined is can unserialize string
     *
     * @param string $string String
     * @return boolean
     */
    protected function isSerialized($string)
    {
        if (trim($string) == '') {
            return false;
        }

        if (preg_match('/^(i|s|a|o|d|N)(.*);/si', $string)) {
            return true;
        }

        return false;
    }
}
