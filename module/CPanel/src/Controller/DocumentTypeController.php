<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\CPanel\Controller;

use MSBios\CPanel\Mvc\Controller\AbstractActionController;
use MSBios\Db\TableGateway\TableGateway;
use MSBios\Db\TableGateway\TableGatewayInterface;
use MSBios\Document\Resource\Record\DocumentType;
use MSBios\Document\Resource\Record\Tab;
use MSBios\Document\Resource\Resources;
use MSBios\Document\Resource\Table\PropertyTableGateway;
use MSBios\Document\Resource\Table\TabTableGateway;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use MSBios\Resource\RecordInterface;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\Db\Sql\Select;
use Zend\EventManager\Event;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayObject;
use Zend\View\Model\ViewModel;

/**
 * Class DocumentTypeController
 * @package MSBios\Document\CPanel\Controller
 */
class DocumentTypeController extends AbstractActionController
{
    /** @var RecordRepositoryInterface */
    protected $templates;

   /** @var RecordRepositoryInterface */
    protected $tabs;

    /** @var RecordRepositoryInterface */
    protected $properties;

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $e->getApplication()->getServiceManager();

        // TODO: Need to move DI?
        $this->templates = $serviceManager->get(TemplateTableGateway::class);
        $this->tabs = $serviceManager->get(TabTableGateway::class);
        $this->properties = $serviceManager->get(PropertyTableGateway::class);

        /** @var EventManagerInterface $eventManager */
        $eventManager = $e->getTarget()
            ->getEventManager();

        $eventManager->attach(self::EVENT_PRE_BIND_DATA, [$this, 'onPreBindData']);
        $eventManager->attach(self::EVENT_PRE_MERGE_DATA, [$this, 'onPreMergeData']);
        return parent::onDispatch($e);
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        /** @var ViewModel $viewModel */
        $viewModel = parent::indexAction();

        /**
         * @param TableGatewayInterface $tableGateway
         * @return DbSelect
         */
        $fetchBy = function (TableGatewayInterface $tableGateway) {

            /** @var Select|TableGateway $select */
            $select = $tableGateway
                ->getSql()
                ->select();

            $select->join(
                ['t' => Resources::SYS_T_TEMPLATES],
                't.id = templateid',
                ['view' => 'name'],
                Select::JOIN_LEFT
            );

            return new DbSelect($select, $tableGateway->getAdapter());
        };

        /** @var Paginator $paginator */
        $paginator = $this->repository
            ->fetchAll($fetchBy);

        /** @var Paginator $defaultPaginator */
        $defaultPaginator = $viewModel
            ->getVariable('paginator');

        $paginator
            ->setItemCountPerPage($defaultPaginator->getItemCountPerPage())
            ->setCurrentPageNumber($defaultPaginator->getCurrentPageNumber());

        return $viewModel
            ->setVariable('paginator', $paginator);
    }

    /**
     * @param EventInterface|Event $e
     */
    public function onPreBindData(EventInterface $e)
    {
        /** @var ArrayObject $row */
        $row = $e->getParam('row');

        /** @var array $tabs */
        $tabs = $this->tabs
            ->fetchAll(['documenttypeid' => $row->getId()])
            ->getCurrentItems();

        /**
         * @var int $i
         * @var Tab $tab
         */
        foreach ($tabs as $i => $tab) {

            $tab = $tab->toArray();
            $tab['properties'] = [];

            /** @var Paginator $properties */
            $properties = $this->properties->fetchAll(['tabid' => $tab['id']]);

            foreach ($properties as $property) {
                $tab['properties'][] = $property->toArray();
            }

            $tabs[$i] = $tab;
        }

        $row['tabs'] = $tabs;
    }

    /**
     * @param EventInterface $e
     */
    public function onPreMergeData(EventInterface $e)
    {
        /** @var ArrayObject $row */
        $row = $e->getParam('row');

        $this->templates->delete();

        /** @var ArrayObject $templates */
        $templates = $row['templates'];

        var_dump($templates);
        die();

        /** @var ArrayObject $tabs */
        $tabs = $row['tabs'];

        unset($row['templates'], $row['tabs']);
    }

    /**
     * @return DocumentType|RecordInterface
     */
    protected static function factory()
    {
        return new DocumentType;
    }
}