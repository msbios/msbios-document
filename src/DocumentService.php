<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document;

use Kubnete\Resource\Record\Document;
use Kubnete\Resource\Record\Property\Value;
use Kubnete\Resource\Record\Template;
use Kubnete\Resource\Table\PropertyValueTableGateway;
use Kubnete\Resource\Table\TemplateTableGateway;
use MSBios\Db\TablePluginManager;
use Psr\Container\ContainerInterface;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayObject;

/**
 * Class DocumentService
 * @package MSBios\Document
 */
class DocumentService implements DocumentServiceInterface
{
    /** @var ContainerInterface */
    protected $container;

    /** @var Document */
    protected $document;

    /**
     * DocumentService constructor.
     * @param ContainerInterface $container
     * @param Document|null $document
     */
    public function __construct(ContainerInterface $container, Document $document = null)
    {
        $this->container = $container;
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
     * @return bool
     */
    public function hasLayout()
    {

        if (!$this->hasDocument()) {
            return false;
        }

        return !empty($this->document['layoutid']);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \MSBios\Resource\Exception\RowNotFoundException
     */
    protected function templateIdentifier($id)
    {
        /** @var TemplateTableGateway $templateRepository */
        $templateRepository =$this->container
            ->get(TemplateTableGateway::class);

        /** @var Template $templateRow */
        $templateRow = $templateRepository->fetch($id);
        return $templateRow['identifier'];
    }

    /**
     * @return mixed|null
     * @throws \MSBios\Resource\Exception\RowNotFoundException
     */
    public function getLayout()
    {
        if ($this->hasDocument() && $this->hasLayout()) {
            return $this->templateIdentifier($this->document['layoutid']);
        }
        return null;
    }

    /**
     * @return mixed|null
     * @throws \MSBios\Resource\Exception\RowNotFoundException
     */
    public function getView()
    {
        if ($this->hasDocument()) {
            return $this->templateIdentifier($this->document['viewid']);
        }

        return null;
    }

    /**
     * @return array
     */
    public function getVariables()
    {
        /** @var array $variables */
        $variables = [];

        if ($this->hasDocument()) {

            /** @var TablePluginManager $tableManager */
            $tableManager = $this->container
                ->get(TablePluginManager::class);

            /** @var PropertyValueTableGateway $propertyValueRepository */
            $propertyValueRepository =$this->container
                ->get(PropertyValueTableGateway::class);

            /** @var Paginator $paginator */
            $paginator = $propertyValueRepository
                ->fetchByDocument($this->document);

            /** @var Value $record */
            foreach ($paginator as $record) {
                if ($this->isSerialized($record['value'])) {
                    $record['value'] = unserialize($record['value']);
                }
                $variables[$record['identifier']] = $record['value'];
            }
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