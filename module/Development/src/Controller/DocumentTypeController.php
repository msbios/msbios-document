<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Document\Development\Controller;

use MSBios\Document\CPanel\Mvc\Controller\AbstractActionController;
use MSBios\Document\Resource\Record\Tab;
use MSBios\Document\Resource\Table\PropertyTableGateway;
use MSBios\Document\Resource\Table\TabTableGateway;
use MSBios\Document\Resource\Table\TemplateTableGateway;
use MSBios\Resource\RecordRepositoryInterface;
use Zend\EventManager\Event;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayObject;

/**
 * Class DocumentTypeController
 * @package MSBios\Document\Development\Controller
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
     * @param EventInterface|Event $e
     */
    public function onPreBindData(EventInterface $e)
    {
        /** @var ArrayObject $row */
        $row = $e->getParam('row');

        /** @var array $tabs */
        $tabs = $this->tabs
            ->fetchAll(['documenttypeid' => $row['id']])
            ->getCurrentItems();

        /**
         * @var int $i
         * @var Tab $tab
         */
        foreach ($tabs as $i => $tab) {
            $tab['properties'] = $this->properties->fetchAll(['tabid' => $tab['id']]);
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

        var_dump($templates); die();

        /** @var ArrayObject $tabs */
        $tabs = $row['tabs'];

        unset($row['templates'], $row['tabs']);
    }
}
